<?php
/*
* PinaCMS
*
* THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
* "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
* LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
* A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
* OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
* SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
* LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
* DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
* THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
* (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
* OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*
* @copyright © 2010 Dobrosite ltd.
*/
if (!defined('PATH')){ exit; }



require_once PATH_CORE.'classes/TableDataGateway.php';

class ConfigGateway extends TableDataGateway
{
	var $table = "cody_config";
	var $fields = array(
		'site_id' => "int(10) NOT NULL DEFAULT '0'",
		'account_id' => "int(10) NOT NULL DEFAULT '0'",
		'module_key' => "varchar(32) NOT NULL DEFAULT ''",
		'config_key' => "varchar(32) NOT NULL DEFAULT ''",
		'config_value' => "varchar(255) NOT NULL DEFAULT ''",
		'config_type' => "varchar(32) NOT NULL DEFAULT 'text'",
		'config_title' => "varchar(255) NOT NULL DEFAULT ''",
		'config_description' => "varchar(255) NOT NULL DEFAULT ''",
		'config_order' => "int(1) NOT NULL DEFAULT '0'",
	);

	var $indexes = array(
		'PRIMARY KEY' => array('site_id','module_key','config_key')
	);

	var $useSiteId = true;
	var $useAccountId = true;

}