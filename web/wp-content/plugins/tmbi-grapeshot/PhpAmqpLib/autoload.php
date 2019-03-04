<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
spl_autoload_register(
    function($class) {
        static $classes = null;
        if ($classes === null) {
            $classes = array(
                'phpamqplib\\channel\\abstractchannel' => '/Channel/AbstractChannel.php',
                'phpamqplib\\channel\\amqpchannel' => '/Channel/AMQPChannel.php',
                'phpamqplib\\connection\\abstractconnection' => '/Connection/AbstractConnection.php',
                'phpamqplib\\connection\\amqpconnection' => '/Connection/AMQPConnection.php',
                'phpamqplib\\connection\\amqplazyconnection' => '/Connection/AMQPLazyConnection.php',
                'phpamqplib\\connection\\amqpsocketconnection' => '/Connection/AMQPSocketConnection.php',
                'phpamqplib\\connection\\amqpsslconnection' => '/Connection/AMQPSSLConnection.php',
                'phpamqplib\\connection\\amqpstreamconnection' => '/Connection/AMQPStreamConnection.php',
                'phpamqplib\\exception\\amqpbasiccancelexception' => '/Exception/AMQPBasicCancelException.php',
                'phpamqplib\\exception\\amqpchannelexception' => '/Exception/AMQPChannelException.php',
                'phpamqplib\\exception\\amqpconnectionexception' => '/Exception/AMQPConnectionException.php',
                'phpamqplib\\exception\\amqpexception' => '/Exception/AMQPException.php',
                'phpamqplib\\exception\\amqpexceptioninterface' => '/Exception/AMQPExceptionInterface.php',
                'phpamqplib\\exception\\amqpinvalidargumentexception' => '/Exception/AMQPInvalidArgumentException.php',
                'phpamqplib\\exception\\amqpioexception' => '/Exception/AMQPIOException.php',
                'phpamqplib\\exception\\amqplogicexception' => '/Exception/AMQPLogicException.php',
                'phpamqplib\\exception\\amqpoutofboundsexception' => '/Exception/AMQPOutOfBoundsException.php',
                'phpamqplib\\exception\\amqpoutofrangeexception' => '/Exception/AMQPOutOfRangeException.php',
                'phpamqplib\\exception\\amqpprotocolchannelexception' => '/Exception/AMQPProtocolChannelException.php',
                'phpamqplib\\exception\\amqpprotocolconnectionexception' => '/Exception/AMQPProtocolConnectionException.php',
                'phpamqplib\\exception\\amqpprotocolexception' => '/Exception/AMQPProtocolException.php',
                'phpamqplib\\exception\\amqpruntimeexception' => '/Exception/AMQPRuntimeException.php',
                'phpamqplib\\exception\\amqptimeoutexception' => '/Exception/AMQPTimeoutException.php',
                'phpamqplib\\helper\\debughelper' => '/Helper/DebugHelper.php',
                'phpamqplib\\helper\\mischelper' => '/Helper/MiscHelper.php',
                'phpamqplib\\helper\\protocol\\methodmap080' => '/Helper/Protocol/MethodMap080.php',
                'phpamqplib\\helper\\protocol\\methodmap091' => '/Helper/Protocol/MethodMap091.php',
                'phpamqplib\\helper\\protocol\\protocol080' => '/Helper/Protocol/Protocol080.php',
                'phpamqplib\\helper\\protocol\\protocol091' => '/Helper/Protocol/Protocol091.php',
                'phpamqplib\\helper\\protocol\\wait080' => '/Helper/Protocol/Wait080.php',
                'phpamqplib\\helper\\protocol\\wait091' => '/Helper/Protocol/Wait091.php',
                'phpamqplib\\message\\amqpmessage' => '/Message/AMQPMessage.php',
                'phpamqplib\\wire\\abstractclient' => '/Wire/AbstractClient.php',
                'phpamqplib\\wire\\amqpabstractcollection' => '/Wire/AMQPAbstractCollection.php',
                'phpamqplib\\wire\\amqparray' => '/Wire/AMQPArray.php',
                'phpamqplib\\wire\\amqpdecimal' => '/Wire/AMQPDecimal.php',
                'phpamqplib\\wire\\amqpreader' => '/Wire/AMQPReader.php',
                'phpamqplib\\wire\\amqptable' => '/Wire/AMQPTable.php',
                'phpamqplib\\wire\\amqpwriter' => '/Wire/AMQPWriter.php',
                'phpamqplib\\wire\\constants080' => '/Wire/Constants080.php',
                'phpamqplib\\wire\\constants091' => '/Wire/Constants091.php',
                'phpamqplib\\wire\\genericcontent' => '/Wire/GenericContent.php',
                'phpamqplib\\wire\\io\\abstractio' => '/Wire/IO/AbstractIO.php',
                'phpamqplib\\wire\\io\\socketio' => '/Wire/IO/SocketIO.php',
                'phpamqplib\\wire\\io\\streamio' => '/Wire/IO/StreamIO.php'
            );
        }
        $cn = strtolower($class);
        if (isset($classes[$cn])) {
            require __DIR__ . $classes[$cn];
        }
    },
    true,
    false
);
// @codeCoverageIgnoreEnd