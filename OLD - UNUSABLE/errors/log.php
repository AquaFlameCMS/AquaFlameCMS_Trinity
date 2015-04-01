<?php
/**
 * Copyright (C) 2014 AquaflameCMS <http://aquaflame.org/>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/

if(isset($_GET['clearLog'])) {
    @file_put_contents('log.dbg', null);
    header('Location: log.php');
    exit;
}
echo '
<html>
<head>
<title>AquaFlameCMS Debug Log</title>
</head>
<body>
AquaFlameCMS Debug Log <br />
<a href="log.php?clearLog">Clear log</a>
<br /><hr />';
@include('log.dbg');
echo '</body></html>';
?>