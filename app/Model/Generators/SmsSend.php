<?php
namespace App\Model\Generators;

class SmsSend {

    static function sendTest($mobile){
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        /*
        $api_href = 'https://api.mobizon.com/service/message/sendsmsmessage?apiKey=f469d687668b4d38d626f127ef4e5218beb1f21b';
        $api_href .= '&recipient='.$mobile.'&from=BETMAN&text=Текст сообщения';
        file_get_contents($api_href);
        exit();
        */
        $api = new MobizonApi('f469d687668b4d38d626f127ef4e5218beb1f21b');
        $alphaname = 'BETMAN';
        if ($api->call('message',
            'sendSMSMessage',
            array(
                'recipient' => $mobile,
                'text'      => 'Привет это тестовое сообщение'
            ))
        ) {
            $messageId = $api->getData('messageId');
            echo 'Message created with ID:' . $messageId . PHP_EOL;
            if ($messageId) {
                echo 'Get message info...' . PHP_EOL;
                $messageStatuses = $api->call(
                    'message',
                    'getSMSStatus',
                    array(
                        'ids' => array($messageId, '13394', '11345', '4393')
                    ),
                    array(),
                    true
                );
                if ($api->hasData()) {
                    foreach ($api->getData() as $messageInfo) {
                        echo 'Message # ' . $messageInfo->id . " status:\t" . $messageInfo->status . PHP_EOL;
                    }
                }
            }
        } else {
            echo 'An error occurred while sending message: [' . $api->getCode() . '] ' . $api->getMessage() . 'See details below:' . PHP_EOL;
            var_dump(array($api->getCode(), $api->getData(), $api->getMessage()));
        }
    }
}
