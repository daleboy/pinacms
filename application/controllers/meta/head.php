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



$data = $_GET;

if (empty($data["action"]) && empty($data["path"]) && !empty($data["dispatch"]))
{
	$data = dispatch($data["dispatch"]);
}

$config = getConfig();

$metaFound = false;
if (!empty($data["action"]))
{
	include PATH_TABLES."meta.php";
	$metaGateway = new MetaGateway();

	$params = '';
	foreach ($data as $k=>$v)
	{
		if ($k == 'action') continue;
		if (!empty($params)) $params .= '&';
		$params = $params . $k.'='.$v;
	}

	$meta = $metaGateway->getByItem($data["action"], $params);

	if (empty($meta["meta_title"])) $meta["meta_title"] =  $config->get("seo", "meta_title");
	if (empty($meta["meta_keys"])) $meta["meta_keys"] =  $config->get("seo", "meta_keys");
	if (empty($meta["meta_description"])) $meta["meta_description"] =  $config->get("seo", "meta_description");

	$request->result('meta', $meta);
	$metaFound = true;
}

if (!$metaFound)
{
	$request->result('meta', array(
		"meta_title" => $config->get("seo", "meta_title"),
		"meta_keys" => $config->get("seo", "meta_keys"),
		"meta_description" => $config->get("seo", "meta_description"),
	));
}