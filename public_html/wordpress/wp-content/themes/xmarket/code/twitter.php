<?php
function etheme_capture_tweets($user = '8theme', $count = 2, $format = 'json') {
    $request = curl_init("https://api.twitter.com/1/statuses/user_timeline." . $format. "?include_entities=true&include_rts=true&screen_name=" . $user . "&count=" . $count);    
    curl_setopt($request, CURLOPT_TIMEOUT, 30);
    curl_setopt($request, CURLOPT_RETURNTRANSFER,1);
    $rawOutput = curl_exec($request);
    return $rawOutput;
}

function etheme_tweet_linkify($tweet) {
	$tweet = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $tweet);
	$tweet = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $tweet);
	$tweet = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $tweet);
	$tweet = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $tweet);

	return $tweet;
}

function etheme_store_tweets($file, $tweets) {
    ob_start(); // turn on the output buffering 
    $fo = fopen($file, 'w'); // opens for writing only or will creat it's not there
    if (!$fo) return etheme_print_tweet_error(error_get_last());
    $fr = fwrite($fo, $tweets); // writes to the file what was grabbed from the previouse function
    if (!$fr) return etheme_print_tweet_error(error_get_last());
    fclose($fo); // closes
    ob_end_flush(); // finishes and flushes the output buffer; 
}

function etheme_pick_tweets($file) {
    ob_start(); // turn on the output buffering 
    $fo = fopen($file, 'r'); // opens for reading only 
    if (!$fo) return etheme_print_tweet_error(error_get_last());
    $fr = fread($fo, filesize($file));
    if (!$fr) return etheme_print_tweet_error(error_get_last());
    fclose($fo);
    ob_end_flush();
    return $fr;
}

function etheme_print_tweet_error($errorArray) {
    return '<p class="eth-error">Error: ' . $errorArray['message'] . 'in ' . $errorArray['file'] . 'on line ' . $errorArray['line'] . '</p>';
}

function etheme_print_tweets() {
    $user = etheme_get_option('twitter_name');
    $cachefile = ETHEME_CODE_DIR . '/cache/twitterCache.json'; // the location to your cache file
    $cachetime = 1; // set the cach time 50 = five minutes
    // the file exitsts but is outdated, update the cache file
    if (file_exists($cachefile) && !( time() - $cachetime < filemtime($cachefile))) {
        $tweets = etheme_capture_tweets($user);
        $tweets_decoded = json_decode($tweets, true);
        //if update fails - load outdated file
        if(isset($tweets_decoded['error'])) {
            $tweets = etheme_pick_tweets($cachefile);
        }
    }
    //file doesn't exist, create new cache file
    elseif (!file_exists($cachefile)) {
        $tweets = etheme_capture_tweets($user);
        $tweets_decoded = json_decode($tweets, true);
        //if request fails, and there is no old cache file - print error
        if($tweets_decoded['error']) {
            return 'Error: ' . $tweets_decoded['error'];
        }
        //make new cache file with request results
        else {
            etheme_store_tweets($cachefile, $tweets);            
        }
    }
    //file exists and is fresh
    //load the cache file
    else { 
       $tweets = etheme_pick_tweets($cachefile);
    }
    $tweets = json_decode($tweets, true);
    $html = '';
    foreach ($tweets as $tweet) {
        $html .= '<p class="twitter-message">' . $tweet['text'] . '</p>';
    }
    $html = etheme_tweet_linkify($html);
    return $html;
}