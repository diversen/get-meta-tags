<?php

namespace diversen;

use DOMDocument;

/**
 * Class based on this answer found on stackoverflow
 * http://stackoverflow.com/questions/3711357/getting-title-and-meta-tags-from-external-website
 */

class meta {

    /**
     * Curl the document
     * @param string $url
     * @param int $timeout
     * @return string $data
     */
    private function curl($url, $timeout) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
    
    /**
     * 
     * @param string $url
     * @param array $tags array ('description', 'keywords')
     * @param int $timeout seconds
     * @return mixed false| array
     */
    public function getMeta($url, $tags = array ('description', 'keywords'), $timeout = 10) {
        
        $html = $this->curl($url, $timeout);
        if (!$html) {
            return false;
        }

        $doc = new DOMDocument();
        @$doc->loadHTML($html);
        $nodes = $doc->getElementsByTagName('title');

        // Get and display what you need:
        
        $ary = [];
        
        $ary['title'] = $nodes->item(0)->nodeValue;
        $metas = $doc->getElementsByTagName('meta');
        
        for ($i = 0; $i < $metas->length; $i++) {
            $meta = $metas->item($i);
            
            foreach($tags as $tag) {
                if ($meta->getAttribute('name') == $tag) {
                    $ary[$tag] = $meta->getAttribute('content');
                }
            }
        }
        return $ary;
    }
}
