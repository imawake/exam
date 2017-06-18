<?php

require_once('./LINEBotTiny.php');

$channelAccessToken = '<channelAccessToken>';
$channelSecret = '<channelSecret>';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    if(strpos($message['text'],'ŠT—v') !== false ){
                                $rep = "<‰æ‘œ‚â•¶Í“™‚ÅƒT[ƒrƒX‚ÌŠT—v‚ğ“`‚¦‚Ü‚·>";

                            } else if(strpos($message['text'],'—”O') !== false ){
                                $rep = "<‰æ‘œ‚â•¶Í“™‚ÅƒT[ƒrƒX‚Ì—”O‚ğ“`‚¦‚Ü‚·>";

                            } else if(strpos($message['text'],'“Á’·') !== false ){
                                $rep = "<‰æ‘œ‚â•¶Í“™‚ÅƒT[ƒrƒX‚Ì“Á’·‚ğ“`‚¦‚Ü‚·>";

                            } else if(strpos($message['text'],'‹q') !== false ){
                                $rep = "<‰æ‘œ‚â•¶Í“™‚Å‚¨‹q—l‚Ìº‚ğ“`‚¦‚Ü‚·>";

                            } else if(strpos($message['text'],'º') !== false ){
                                $rep = "<‰æ‘œ‚â•¶Í“™‚Å‚¨‹q—l‚Ìº‚ğ“`‚¦‚Ü‚·>";

                            } else if(strpos($message['text'],'à–¾‰ï') !== false ){
                                $rep = "<à–¾‰ï‚ÌƒXƒPƒWƒ…[ƒ‹‚Æ—\–ñ‚ÌURL‚ğ“`‚¦‚Ü‚·>";

                            } else if(strpos($message['text'],'ƒXƒPƒWƒ…[ƒ‹') !== false ){
                                $rep = "<à–¾‰ï‚ÌƒXƒPƒWƒ…[ƒ‹‚Æ—\–ñ‚ÌURL‚ğ“`‚¦‚Ü‚·>";

                            } else if(strpos($message['text'],'’n}') !== false ){
                                $rep = "<à–¾‰ï‰ïê‚Ü‚Å‚Ì’n}‚ğ“`‚¦‚Ü‚·>";

                            } else if(strpos($message['text'],'ÅŠñ‚è') !== false ){
                                $rep = "<ÅŠñ‚è‰w‚©‚çà–¾‰ï‰ïê‚Ü‚Å‚ÌƒAƒNƒZƒX•û–@‚ğ“`‚¦‚Ü‚·@ÅŠñ‚è‰w‚ª•¡”‚ ‚éê‡A•Ê“r‰w–¼‚ğ“ü—Í‚µ‚Ä’¸‚­‚æ‚¤‚É‘£‚µ‚Ü‚·>";

                            } else if(strpos($message['text'],'ƒAƒNƒZƒX') !== false ){
                                $rep = "<ÅŠñ‚è‰w‚©‚çà–¾‰ï‰ïê‚Ü‚Å‚ÌƒAƒNƒZƒX•û–@‚ğ“`‚¦‚Ü‚·@ÅŠñ‚è‰w‚ª•¡”‚ ‚éê‡A•Ê“r‰w–¼‚ğ“ü—Í‚µ‚Ä’¸‚­‚æ‚¤‚É‘£‚µ‚Ü‚·>";

                            } else if($message['text']=='‰ïê'){
                                $rep = "<à–¾‰ï‰ïê‚Ì•µˆÍ‹C‚ª“`‚í‚éÊ^‚â“®‰æ‚ÌURL‚ğ“`‚¦‚Ü‚·>";

                            } else if($message['text']=='•µˆÍ‹C'){
                                $rep = "<à–¾‰ï‰ïê‚Ì•µˆÍ‹C‚ª“`‚í‚éÊ^‚â“®‰æ‚ÌURL‚ğ“`‚¦‚Ü‚·>";

                            } else if($message['text']=='–¢—ˆuŒü'){
                                $rep = "2‚Â–Ú‚ÌƒvƒŒƒ[ƒ“ƒg‚Í‚±‚¿‚ç‚©‚ç‚¨ó‚¯æ‚è‚­‚¾‚³‚¢B@http://imawake.xsrv.jp/present/2ndPresent.txt";

                            } else if($message['text']=='0ƒx[ƒX'){
                                $rep = "3‚Â–Ú‚ÌƒvƒŒƒ[ƒ“ƒg‚Í‚±‚¿‚ç‚©‚ç‚¨ó‚¯æ‚è‚­‚¾‚³‚¢B@http://imawake.xsrv.jp/present/3rdPresent.txt";

                            } 
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $rep
                            )
                        )
                    ));
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
