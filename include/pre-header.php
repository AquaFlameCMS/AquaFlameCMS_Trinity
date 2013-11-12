<?php
foreach (glob("functions.d/*.php") as $Functions)
	{
		include $Functions;
	}
