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
                    if(strpos($message['text'],'�T�v') !== false ){
                                $rep = "<�摜�╶�͓��ŃT�[�r�X�̊T�v��`���܂�>";

                            } else if(strpos($message['text'],'���O') !== false ){
                                $rep = "<�摜�╶�͓��ŃT�[�r�X�̗��O��`���܂�>";

                            } else if(strpos($message['text'],'����') !== false ){
                                $rep = "<�摜�╶�͓��ŃT�[�r�X�̓�����`���܂�>";

                            } else if(strpos($message['text'],'�q') !== false ){
                                $rep = "<�摜�╶�͓��ł��q�l�̐���`���܂�>";

                            } else if(strpos($message['text'],'��') !== false ){
                                $rep = "<�摜�╶�͓��ł��q�l�̐���`���܂�>";

                            } else if(strpos($message['text'],'������') !== false ){
                                $rep = "<������̃X�P�W���[���Ɨ\���URL��`���܂�>";

                            } else if(strpos($message['text'],'�X�P�W���[��') !== false ){
                                $rep = "<������̃X�P�W���[���Ɨ\���URL��`���܂�>";

                            } else if(strpos($message['text'],'�n�}') !== false ){
                                $rep = "<��������܂ł̒n�}��`���܂�>";

                            } else if(strpos($message['text'],'�Ŋ��') !== false ){
                                $rep = "<�Ŋ��w�����������܂ł̃A�N�Z�X���@��`���܂��@�Ŋ��w����������ꍇ�A�ʓr�w������͂��Ē����悤�ɑ����܂�>";

                            } else if(strpos($message['text'],'�A�N�Z�X') !== false ){
                                $rep = "<�Ŋ��w�����������܂ł̃A�N�Z�X���@��`���܂��@�Ŋ��w����������ꍇ�A�ʓr�w������͂��Ē����悤�ɑ����܂�>";

                            } else if($message['text']=='���'){
                                $rep = "<��������̕��͋C���`���ʐ^�⓮���URL��`���܂�>";

                            } else if($message['text']=='���͋C'){
                                $rep = "<��������̕��͋C���`���ʐ^�⓮���URL��`���܂�>";

                            } else if($message['text']=='�����u��'){
                                $rep = "2�ڂ̃v���[���g�͂����炩�炨�󂯎�肭�������B�@http://imawake.xsrv.jp/present/2ndPresent.txt";

                            } else if($message['text']=='0�x�[�X'){
                                $rep = "3�ڂ̃v���[���g�͂����炩�炨�󂯎�肭�������B�@http://imawake.xsrv.jp/present/3rdPresent.txt";

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
