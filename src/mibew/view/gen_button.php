<?php
/*
 * Copyright 2005-2013 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require_once(dirname(__FILE__).'/inc_menu.php');
$page['title'] = getlocal("page.gen_button.title");
$page['menuid'] = "getcode";

function tpl_content() { global $page, $mibewroot, $errors;
?>

<?php echo getlocal("page.gen_button.intro") ?>
<br />
<br />
<?php 
require_once(dirname(__FILE__).'/inc_errors.php');
?>

<form name="buttonCodeForm" method="get" action="<?php echo $mibewroot ?>/operator/getcode.php">
	<div class="mform"><div class="formtop"><div class="formtopi"></div></div><div class="forminner">

	<div class="fieldForm">
		<div class="fieldinrow">
			<div class="flabel"><?php echo getlocal("page.gen_button.choose_locale") ?></div>
			<div class="fvaluenodesc">
				<select name="lang" onchange="this.form.submit();"><?php foreach($page['availableLocales'] as $k) { echo "<option value=\"".$k."\"".($k == form_value("lang") ? " selected=\"selected\"" : "").">".$k."</option>"; } ?></select>
			</div>
		</div>

		<div class="fieldinrow">
			<div class="flabel"><?php echo getlocal("page.gen_button.choose_style") ?></div>
			<div class="fvaluenodesc">
				<select name="style" onchange="this.form.submit();"><?php foreach($page['availableChatStyles'] as $k => $v) { echo "<option value=\"".$k."\"".($k == form_value("style") ? " selected=\"selected\"" : "").">".$v."</option>"; } ?></select>
			</div>
		</div>
		<br clear="all"/>

		<div class="fieldinrow">
			<div class="flabel"><?php echo getlocal("page.gen_button.choose_type") ?></div>
			<div class="fvaluenodesc">
				<select name="codetype" onchange="this.form.submit();"><?php foreach($page['availableCodeTypes'] as $k => $v) { echo "<option value=\"".$k."\"".($k == form_value("codetype") ? " selected=\"selected\"" : "").">".$v."</option>"; } ?></select>
			</div>
		</div>
		<br clear="all"/>

<?php if(! $page['operator_code']) { ?>
		<div class="fieldinrow">
			<div class="flabel"><?php echo getlocal("page.gen_button.choose_image") ?></div>
			<div class="fvaluenodesc">
				<select name="i" onchange="this.form.submit();"><?php foreach($page['availableImages'] as $k) { echo "<option value=\"".$k."\"".($k == form_value("image") ? " selected=\"selected\"" : "").">".$k."</option>"; } ?></select>
			</div>
		</div>

<?php if($page['enabletracking']) { ?>
		<div class="fieldinrow">
			<div class="flabel"><?php echo getlocal("page.gen_button.choose_invitationstyle") ?></div>
			<div class="fvaluenodesc">
				<select name="invitationstyle" onchange="this.form.submit();"><?php foreach($page['availableInvitationStyles'] as $k => $v) { echo "<option value=\"".$k."\"".($k == form_value("invitationstyle") ? " selected=\"selected\"" : "").">".$v."</option>"; } ?></select>
			</div>
		</div>
<?php } ?>
		<br clear="all"/>
<?php } ?>

		<div class="fieldinrow">
			<div class="flabel"><?php echo getlocal("page.gen_button.choose_group") ?></div>
			<div class="fvaluenodesc">
				<select name="group" onchange="this.form.submit();"><?php foreach($page['groups'] as $k) { echo "<option value=\"".$k['groupid']."\"".($k['groupid'] == form_value("group") ? " selected=\"selected\"" : "").">".str_repeat('&nbsp;', $k['level']*2).$k['vclocalname']."</option>"; } ?></select>
			</div>
		</div>
		<br clear="all"/>

		<div class="fieldinrow">
			<div class="flabel"><?php echo getlocal("page.gen_button.include_site_name") ?></div>
			<div class="fvaluenodesc">
				<input type="checkbox" name="hostname" value="on"<?php echo form_value_cb('hostname') ? " checked=\"checked\"" : "" ?> onchange="this.form.submit();"/>
			</div>
		</div>

<?php if( $page['formhostname'] ) { ?>

		<div class="fieldinrow">
			<div class="flabel"><?php echo getlocal("page.gen_button.secure_links") ?></div>
			<div class="fvaluenodesc">
				<input type="checkbox" name="secure" value="on"<?php echo form_value_cb('secure') ? " checked=\"checked\"" : "" ?> onchange="this.form.submit();"/>
			</div>
		</div>
<?php } ?>
		<br clear="all"/>

		<div class="field">
			<div class="flabel"><?php echo getlocal("page.gen_button.modsecurity") ?></div>
			<div class="fvaluenodesc">
				<input type="checkbox" name="modsecurity" value="on"<?php echo form_value_cb('modsecurity') ? " checked=\"checked\"" : "" ?> onchange="this.form.submit();"/>
			</div>
		</div>

		<div class="field">
			<div class="flabel"><?php echo getlocal("page.gen_button.code") ?></div>
			<div class="fvaluewithta" dir="ltr">
				<textarea cols="44" rows="15"><?php echo htmlspecialchars($page['buttonCode']) ?></textarea>
			</div>
			<div class="fdescr"><?php echo getlocal("page.gen_button.code.description") ?></div>
			<br clear="all"/>
		</div>

		<div class="field">
			<div class="flabel"><?php echo getlocal("page.gen_button.sample") ?></div>
			<div class="fvaluenodesc">
				<?php echo $page['buttonCode'] ?>
			</div>
		</div>
	</div>
	
	</div><div class="formbottom"><div class="formbottomi"></div></div></div>
</form>

<?php 
} /* content */

require_once(dirname(__FILE__).'/inc_main.php');
?>