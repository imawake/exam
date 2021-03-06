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
                    if(strpos($message['text'],'概要') !== false ){
                                $rep = "<画像や文章等でサービスの概要を伝えます>";

                            } else if(strpos($message['text'],'理念') !== false ){
                                $rep = "<画像や文章等でサービスの理念を伝えます>";

                            } else if(strpos($message['text'],'特長') !== false ){
                                $rep = "<画像や文章等でサービスの特長を伝えます>";

                            } else if(strpos($message['text'],'客') !== false ){
                                $rep = "<画像や文章等でお客様の声を伝えます>";

                            } else if(strpos($message['text'],'声') !== false ){
                                $rep = "<画像や文章等でお客様の声を伝えます>";

                            } else if(strpos($message['text'],'説明会') !== false ){
                                $rep = "<説明会のスケジュールと予約のURLを伝えます>";

                            } else if(strpos($message['text'],'スケジュール') !== false ){
                                $rep = "<説明会のスケジュールと予約のURLを伝えます>";

                            } else if(strpos($message['text'],'地図') !== false ){
                                $rep = "<説明会会場までの地図を伝えます>";

                            } else if(strpos($message['text'],'最寄り') !== false ){
                                $rep = "<最寄り駅から説明会会場までのアクセス方法を伝えます　最寄り駅が複数ある場合、別途駅名を入力して頂くように促します>";

                            } else if(strpos($message['text'],'アクセス') !== false ){
                                $rep = "<最寄り駅から説明会会場までのアクセス方法を伝えます　最寄り駅が複数ある場合、別途駅名を入力して頂くように促します>";

                            } else if($message['text']=='会場'){
                                $rep = "<説明会会場の雰囲気が伝わる写真や動画のURLを伝えます>";

                            } else if($message['text']=='雰囲気'){
                                $rep = "<説明会会場の雰囲気が伝わる写真や動画のURLを伝えます>";

                            } else if($message['text']=='未来志向'){
                                $rep = "2つ目のプレゼントはこちらからお受け取りください。　http://imawake.xsrv.jp/present/2ndPresent.txt";

                            } else if($message['text']=='0ベース'){
                                $rep = "3つ目のプレゼントはこちらからお受け取りください。　http://imawake.xsrv.jp/present/3rdPresent.txt";

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
