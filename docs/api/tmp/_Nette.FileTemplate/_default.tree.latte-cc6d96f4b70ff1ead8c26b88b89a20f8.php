<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.01725500 1392992063";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:62:"/Users/ballen/Applications/apigen/templates/default/tree.latte";i:2;i:1347143210;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Users/ballen/Applications/apigen/templates/default/tree.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'g1vkzi2ivs')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb1108e4a10b_title')) { function _lb1108e4a10b_title($_l, $_args) { extract($_args)
?>Tree<?php
}}

//
// block tree
//
if (!function_exists($_l->blocks['tree'][] = '_lb1fff204d55_tree')) { function _lb1fff204d55_tree($_l, $_args) { extract($_args)
?><div class="tree">
	<ul>
<?php $level = -1 ;foreach ($tree as $reflectionName => $reflection): if ($level === $tree->getDepth()): ?>
				</li>
<?php elseif ($level > $tree->getDepth()): ?>
				<?php echo $template->repeat('</ul></li>', $level - $tree->getDepth()) ?>

<?php elseif (-1 !== $level): ?>
				<ul>
<?php endif ?>

			<li<?php if ($_l->tmp = array_filter(array(!$tree->hasSibling() ? 'last':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>
><div class="<?php if ($tree->hasSibling()): ?>not<?php endif ?>last"><?php if ($_l->ifs[] = ($reflection->documented)): ?>
<a href="<?php echo htmlSpecialChars($template->classUrl($reflectionName)) ?>"><?php endif ?>
<span<?php if ($_l->tmp = array_filter(array($reflection->deprecated ? 'deprecated':null, !$reflection->valid ? 'invalid':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>
><?php echo Nette\Templating\Helpers::escapeHtml($reflectionName, ENT_NOQUOTES) ?>
</span><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ;$interfaces = $reflection->ownInterfaces ?>
			<?php if ($interfaces): ?> implements <?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($interfaces) as $interface): ?>

<?php if ($_l->ifs[] = ($interface->documented)): ?>				<a href="<?php echo htmlSpecialChars($template->classUrl($interface)) ?>
"><?php endif ?>
<span<?php if ($_l->tmp = array_filter(array($interface->deprecated ? 'deprecated':null, !$interface->valid ? 'invalid':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>
><?php echo Nette\Templating\Helpers::escapeHtml($interface->name, ENT_NOQUOTES) ?>
</span><?php if (array_pop($_l->ifs)): ?></a><?php endif ;if (!$iterator->isLast()): ?>
, <?php endif ?>

			<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;endif ?>

<?php $traits = $reflection->ownTraits ?>
			<?php if ($traits): if ($interfaces): ?><br /><span class="padding"></span><?php endif ?>
 uses <?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($traits) as $trait): ?>

<?php if ($_l->ifs[] = ($trait->documented)): ?>				<a href="<?php echo htmlSpecialChars($template->classUrl($trait)) ?>
"><?php endif ?>
<span<?php if ($_l->tmp = array_filter(array($trait->deprecated ? 'deprecated':null, !$trait->valid ? 'invalid':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>
><?php echo Nette\Templating\Helpers::escapeHtml($trait->name, ENT_NOQUOTES) ?></span><?php if (array_pop($_l->ifs)): ?>
</a><?php endif ;if (!$iterator->isLast()): ?>, <?php endif ?>

			<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ;endif ?>

			</div>

<?php $level = $tree->getDepth() ;endforeach ?>
		</li>
		<?php echo $template->repeat('</ul></li>', $level) ?>

	</ul>
</div>
<?php
}}

//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb0799b9ffea_content')) { function _lb0799b9ffea_content($_l, $_args) { extract($_args)
?><div id="content">
	<h1><?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()) ?></h1>

<?php if ($classTree->valid()): ?>
		<h3>Classes</h3>
<?php call_user_func(reset($_l->blocks['tree']), $_l, array('tree' => $classTree) + get_defined_vars()) ;endif ?>

<?php if ($interfaceTree->valid()): ?>
		<h3>Interfaces</h3>
<?php call_user_func(reset($_l->blocks['tree']), $_l, array('tree' => $interfaceTree) + get_defined_vars()) ;endif ?>

<?php if ($traitTree->valid()): ?>
		<h3>Traits</h3>
<?php call_user_func(reset($_l->blocks['tree']), $_l, array('tree' => $traitTree) + get_defined_vars()) ;endif ?>

<?php if ($exceptionTree->valid()): ?>
		<h3>Exceptions</h3>
<?php call_user_func(reset($_l->blocks['tree']), $_l, array('tree' => $exceptionTree) + get_defined_vars()) ;endif ?>
</div>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = '@layout.latte'; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
 $active = 'tree' ?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>



<?php call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 