<?php

interface iCallWs
{
	public function decodeRequest();
	public function sendRequest();
	public function response();

}