# TinyWP

TinyWP provides a very small (<500 bytes) [WordPress](http://wordpress.org/) installation program that will bootstrap a larger WordPress installation.

## How To Use
  * Download [TinyWP](https://github.com/DirtySuds/TinyWP/raw/master/tinywp.php)
  * Upload `tinywp.php` to your server, in the directory you want to install WordPress
  * Point your browser to `tinywp.php` to begin the installation process
  * TinyWP will download the most recent version of WordPress directly from WordPress.org, unzip and install it on your server, and help you begin installing WordPress.

TinyWP is a very small fraction of the size of a full WordPress install.

## How Does It Work

TinyWP is a very small PHP program that only includes enough code download WordPress and start the installation.

Here are the steps TinyWP takes:

  * Deletes itself
  * Downloads [`http://wordpress.org/latest.zip`](http://wordpress.org/latest.zip)
  * Moves all the files in `latest.zip` from the wordpress directory to the root directory of the zip file
  * Extracts `latest.zip` to the current directory on the server
  * Deletes `latest.zip` from the server
  * Redirects the user to `./wp-admin/setup-config.php` to begin WordPress setup

## Authors
Pat Hawks ([pathawks@shortmail.com](mailto:pathawks@shortmail.com))

## License

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program. If not, see [http://www.gnu.org/licenses/](http://www.gnu.org/licenses/).
