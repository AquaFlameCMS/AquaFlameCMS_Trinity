<?php
foreach (glob("functions.d/*.php") as $Functions)
	{
		include_once $Functions;
	}
