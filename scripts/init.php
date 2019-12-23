<?php
/*
 * PHPMailer Package
 * Copyright (C) 2019 Simplusoft LLC
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation version 3.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software Foundation,
 * Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301  USA
 */

namespace DynamicSuite\Package\Time;
use DynamicSuite\Instance;
use DynamicSuite\Package\PHPMailer\PHPMailer;

/** @var Instance $ds */
if (DS_APCU && !isset($ds->mail)) {
    $ds->registerGlobal('mail', new PHPMailer());
    $ds->save();
} else {
    $ds->registerGlobal('mail', new PHPMailer());
}