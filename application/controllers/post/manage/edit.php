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



validateNotEmpty($request, "post_id", lng('internal_error'));

$request->trust();

require_once PATH_TABLES .'post.php';
require_once PATH_TABLES .'blog.php';

$postGateway = new PostGateway();
$p = $postGateway->get($request->param("post_id"));
if(!is_array($p))
{
	$request->stop(lng("access_denied"));
}
$request->result('post', $p);

$request->addLocation(lng('blog_management'), href(array("action" => "blog.manage.home")));
$request->addLocation(lng('post_management'), href(array("action" => "post.manage.home")));

$request->setLayout('admin');

$blogGateway = new BlogGateway();
$b = $blogGateway->get($p['blog_id']);
$request->result('blog_id', $b['blog_id']);

$request->ok(lng('post_editing_in_blog') .' '. $b['blog_title']);