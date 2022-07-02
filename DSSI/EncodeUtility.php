<?php

class EncodeUtility
{
    public static final function encodeData($dataTo): string
    {
        return base64_encode($dataTo);
    }

    public static final function decodeData($dataTo){
        return base64_decode($dataTo);
    }
}