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

class BlogGateway extends TableDataGateway
{
	var $table = "cody_blog";
	var $fields = array(
		'blog_id' => "int(10) NOT NULL AUTO_INCREMENT",
		'site_id' => "int(10) NOT NULL DEFAULT '0'",
		'user_id' => "int(1) NOT NULL DEFAULT '0'",
		'blog_title' => "varchar(255) NOT NULL DEFAULT '0'",
		'blog_description' => "text NULL",
		'blog_public' => "varchar(1) NOT NULL DEFAULT 'N'",
		'blog_enabled' => "varchar(1) NOT NULL DEFAULT 'N'"
	);

	var $indexes = array(
		'PRIMARY KEY' => 'blog_id',
		'KEY blog_enabled' => array('blog_enabled', 'site_id')
	);

	var $orderBy = "blog_id ASC";
	var $useSiteId = true;

        public function reportTitle($id)
        {
            return $this->db->one("
                SELECT `blog_title`
                FROM `".$this->table."`
                WHERE `blog_id` = '".(int)$id."'
            ");
        }
}