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

class AttachmentGateway extends TableDataGateway
{
	var $table = 'cody_attachment';
	var $useSiteId = true;

	var $fields = array(
		'attachment_id' => "int(11) NOT NULL AUTO_INCREMENT",
		'site_id' => "int(10) NOT NULL DEFAULT '0'",
		'attachment_filename' => "varchar(255) NOT NULL DEFAULT ''",
		'attachment_type' => "VARCHAR(20) NOT NULL default ''",
		'attachment_size' => "int(10) unsigned NOT NULL DEFAULT '0'",
		'attachment_title' => "varchar(1024) NOT NULL DEFAULT ''"
	);

	var $indexes = array(
		'PRIMARY KEY' => 'attachment_id',
		'KEY attachment_filename' => 'attachment_filename'
	);
	
	function findByRelationId($gateway, $key, $id)
	{
		$key = $this->db->escape($key);
		$id = $this->db->escape($id);
		
		return $this->db->table("SELECT * FROM
			".$this->table."
			LEFT JOIN ".$gateway->table." ON ".$this->table.".attachment_id = ".$gateway->table.".attachment_id
			WHERE ".$gateway->table.".".$key." = '".$id."'
		");
	}
}