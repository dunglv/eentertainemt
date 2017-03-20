<?php
return array(
    // set your paypal credential
    'client_id' => 'AazQwFZyDjLVZVNvAbua93OKXAQnqn-fNfJpr92Jgx9Ph5-1Zp_uFy7IIxZa4E1OhtMqXJTbCcG--GMc',
    'secret' => 'EFVWH-Z65SwPUXUjwmhwzZeIFfkUFFvaXPLdnfREIkcnI7G_39fNDxjQyl1Ixdp6dxLb471ULgx1lY2i',
 
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',
 
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
 
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,
 
        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',
 
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);