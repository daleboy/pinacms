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

class AccessGateway extends TableDataGateway
{
	var $table = 'cody_access';
	var $orderBy = 'module_key ASC';

	var $fields = array(
		'access_id' => "int(11) NOT NULL AUTO_INCREMENT",
		'module_key' => "varchar(32) NOT NULL DEFAULT ''",
		'access_title' => "varchar(255) NOT NULL DEFAULT ''",
		'access_group_id' => "int(11) NOT NULL DEFAULT '0'",
		'access_enabled' => "varchar(1) NOT NULL DEFAULT 'N'",
	);

	var $indexes = array(
		'PRIMARY KEY' => 'access_id',
		'KEY access_group_id' => 'access_group_id',
		'UNIQUE KEY module_key' => array('module_key', 'access_group_id')
	);
}