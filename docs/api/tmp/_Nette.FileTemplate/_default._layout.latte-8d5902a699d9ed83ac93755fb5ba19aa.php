<?php //netteCache[01]000385a:2:{s:4:"time";s:21:"0.78367400 1392992062";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:65:"/Users/ballen/Applications/apigen/templates/default/@layout.latte";i:2;i:1347143210;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: /Users/ballen/Applications/apigen/templates/default/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'gfndku9cys')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block group
//
if (!function_exists($_l->blocks['group'][] = '_lbe4428129e7_group')) { function _lbe4428129e7_group($_l, $_args) { extract($_args)
?>			<ul>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($groups) as $group): $nextLevel = substr_count($iterator->nextValue, '\\') > substr_count($group, '\\') ?>
				<li<?php if ($_l->tmp = array_filter(array($actualGroup === $group || 0 === strpos($actualGroup, $group . '\\') ? 'active':null, $config->main && 0 === strpos($group, $config->main) ? 'main':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>
><a href="<?php echo htmlSpecialChars($template->groupUrl($group)) ?>"><?php echo Nette\Templating\Helpers::escapeHtml($template->subgroupName($group), ENT_NOQUOTES) ;if ($nextLevel): ?>
<span></span><?php endif ?></a>
<?php if ($nextLevel): ?>
						<ul>
<?php else: ?>
						</li>
<?php if (substr_count($iterator->nextValue, '\\') < substr_count($group, '\\')): ?>
							<?php echo $template->repeat('</ul></li>', substr_count($group, '\\') - substr_count($iterator->nextValue, '\\')) ?>

<?php endif ;endif ;$iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>
			</ul>
<?php
}}

//
// block elements
//
if (!function_exists($_l->blocks['elements'][] = '_lb3443f7ec70_elements')) { function _lb3443f7ec70_elements($_l, $_args) { extract($_args)
?>			<ul>
<?php $iterations = 0; foreach ($elements as $element): ?>				<li<?php if ($_l->tmp = array_filter(array($activeElement === $element ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>
><a href="<?php echo htmlSpecialChars($template->elementUrl($element)) ?>"<?php if ($_l->tmp = array_filter(array($element->deprecated ? 'deprecated':null, !$element->valid ? 'invalid':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>
><?php if ($namespace): echo Nette\Templating\Helpers::escapeHtml($element->shortName, ENT_NOQUOTES) ;else: echo Nette\Templating\Helpers::escapeHtml($element->name, ENT_NOQUOTES) ;endif ?></a></li>
<?php $iterations++; endforeach ?>
			</ul>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
extract(array('robots' => true), EXTR_SKIP) ;extract(array('active' => ''), EXTR_SKIP) ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="generator" content="<?php echo htmlSpecialChars($generator) ?> <?php echo htmlSpecialChars($version) ?>" />
<?php if (!$robots): ?>	<meta name="robots" content="noindex" />
<?php endif ?>

	<title><?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'title', $template->getParameters()) ;if ('overview' !== $active && $config->title): ?>
 | <?php echo Nette\Templating\Helpers::escapeHtml($config->title, ENT_NOQUOTES) ;endif ?></title>

<?php $combinedJs = 'resources/combined.js' ?>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($template->staticFile($combinedJs)) ?>"></script>
<?php $elementListJs = 'elementlist.js' ?>
	<script type="text/javascript" src="<?php echo htmlSpecialChars($template->staticFile($elementListJs)) ?>"></script>
<?php $styleCss = 'resources/style.css' ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo htmlSpecialChars($template->staticFile($styleCss)) ?>" />
<?php if ($config->googleCseId): ?>	<link rel="search" type="application/opensearchdescription+xml" title="<?php echo htmlSpecialChars($config->title) ?>
" href="<?php echo htmlSpecialChars($config->baseUrl) ?>/opensearch.xml" />
<?php endif ?>

<?php if ($config->googleAnalytics): ?>	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', <?php echo Nette\Templating\Helpers::escapeJs($config->googleAnalytics) ?>]);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
<?php endif ?>
</head>

<body>
<div id="left">
	<div id="menu">
<?php if ($_l->ifs[] = ('overview' !== $active)): ?>		<a href="index.html" title="Overview"><?php endif ?>
<span>Overview</span><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ?>

<?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); } ?>

		<div id="groups">
<?php if ($namespaces): ?>
			<h3>Namespaces</h3>
<?php call_user_func(reset($_l->blocks['group']), $_l, array('groups' => $namespaces, 'actualGroup' => $namespace) + get_defined_vars()) ;elseif ($packages): ?>
			<h3>Packages</h3>
<?php call_user_func(reset($_l->blocks['group']), $_l, array('groups' => $packages, 'actualGroup' => $package) + get_defined_vars()) ;endif ?>
		</div>

<?php if (($namespaces || $packages) && ($classes || $interfaces || $traits || $exceptions || $constants || $functions)): ?>		<hr />
<?php endif ?>


		<div id="elements">
<?php if ($classes): ?>
			<h3>Classes</h3>
<?php call_user_func(reset($_l->blocks['elements']), $_l, array('elements' => $classes, 'activeElement' => $class) + get_defined_vars()) ;endif ?>

<?php if ($interfaces): ?>
			<h3>Interfaces</h3>
<?php call_user_func(reset($_l->blocks['elements']), $_l, array('elements' => $interfaces, 'activeElement' => $class) + get_defined_vars()) ;endif ?>

<?php if ($traits): ?>
			<h3>Traits</h3>
<?php call_user_func(reset($_l->blocks['elements']), $_l, array('elements' => $traits, 'activeElement' => $class) + get_defined_vars()) ;endif ?>

<?php if ($exceptions): ?>
			<h3>Exceptions</h3>
<?php call_user_func(reset($_l->blocks['elements']), $_l, array('elements' => $exceptions, 'activeElement' => $class) + get_defined_vars()) ;endif ?>

<?php if ($constants): ?>
			<h3>Constants</h3>
<?php call_user_func(reset($_l->blocks['elements']), $_l, array('elements' => $constants, 'activeElement' => $constant) + get_defined_vars()) ;endif ?>

<?php if ($functions): ?>
			<h3>Functions</h3>
<?php call_user_func(reset($_l->blocks['elements']), $_l, array('elements' => $functions, 'activeElement' => $function) + get_defined_vars()) ;endif ?>
		</div>
	</div>
</div>

<div id="splitter"></div>

<div id="right">
<div id="rightInner">
	<form<?php if ($config->googleCseId): ?> action="http://www.google.com/cse"<?php endif ?> id="search">
		<input type="hidden" name="cx" value="<?php echo htmlSpecialChars($config->googleCseId) ?>" />
		<input type="hidden" name="ie" value="UTF-8" />
<?php if ($config->googleCseLabel): ?>		<input type="hidden" name="more" value="<?php echo htmlSpecialChars($config->googleCseLabel) ?>" />
<?php endif ?>
		<input type="text" name="q" class="text"<?php if ('overview' === $active): ?> autofocus<?php endif ?> />
		<input type="submit" value="Search" />
	</form>

	<div id="navigation">
		<ul>
			<li<?php if ($_l->tmp = array_filter(array('overview' === $active ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
<?php if ($_l->ifs[] = ('overview' !== $active)): ?>				<a href="index.html" title="Overview"><?php endif ?>
<span>Overview</span><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ?>
			</li>
<?php if ($packages): ?>			<li<?php if ($_l->tmp = array_filter(array('package' === $active ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
<?php if ($_l->ifs[] = ('package' !== $active && $package)): ?>				<a href="<?php echo htmlSpecialChars($template->packageUrl($package)) ?>
" title="Summary of <?php echo htmlSpecialChars($package) ?>"><?php endif ?>
<span>Package</span><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ?>
			</li>
<?php endif ;if ($namespaces): ?>			<li<?php if ($_l->tmp = array_filter(array('namespace' === $active ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
<?php if ($_l->ifs[] = ('namespace' !== $active && $namespace)): ?>				<a href="<?php echo htmlSpecialChars($template->namespaceUrl($namespace)) ?>
" title="Summary of <?php echo htmlSpecialChars($namespace) ?>"><?php endif ?>
<span>Namespace</span><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ?>
			</li>
<?php endif ;if (!$function && !$constant): ?>			<li<?php if ($_l->tmp = array_filter(array('class' === $active ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
<?php if ($_l->ifs[] = ('class' !== $active && $class)): ?>				<a href="<?php echo htmlSpecialChars($template->classUrl($class)) ?>
" title="Summary of <?php echo htmlSpecialChars($class->name) ?>"><?php endif ?>
<span>Class</span><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ?>
			</li>
<?php endif ;if ($function): ?>			<li<?php if ($_l->tmp = array_filter(array('function' === $active ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
<?php if ($_l->ifs[] = ('function' !== $active)): ?>				<a href="<?php echo htmlSpecialChars($template->functionUrl($function)) ?>
" title="Summary of <?php echo htmlSpecialChars($function->name) ?>"><?php endif ?>
<span>Function</span><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ?>
			</li>
<?php endif ;if ($constant): ?>			<li<?php if ($_l->tmp = array_filter(array('constant' === $active ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
<?php if ($_l->ifs[] = ('constant' !== $active)): ?>				<a href="<?php echo htmlSpecialChars($template->constantUrl($constant)) ?>
" title="Summary of <?php echo htmlSpecialChars($constant->name) ?>"><?php endif ?>
<span>Constant</span><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ?>
			</li>
<?php endif ?>
		</ul>
		<ul>
<?php if ($config->tree): ?>			<li<?php if ($_l->tmp = array_filter(array('tree' === $active ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
<?php if ($_l->ifs[] = ('tree' !== $active)): ?>				<a href="tree.html" title="Tree view of classes, interfaces, traits and exceptions"><?php endif ?>
<span>Tree</span><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ?>
			</li>
<?php endif ;if ($config->deprecated): ?>			<li<?php if ($_l->tmp = array_filter(array('deprecated' === $active ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
<?php if ($_l->ifs[] = ('deprecated' !== $active)): ?>				<a href="deprecated.html" title="List of deprecated elements"><?php endif ?>
<span>Deprecated</span><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ?>
			</li>
<?php endif ;if ($config->todo): ?>			<li<?php if ($_l->tmp = array_filter(array('todo' === $active ? 'active':null))) echo ' class="' . htmlSpecialChars(implode(" ", array_unique($_l->tmp))) . '"' ?>>
<?php if ($_l->ifs[] = ('todo' !== $active)): ?>				<a href="todo.html" title="Todo list"><?php endif ?>
<span>Todo</span><?php if (array_pop($_l->ifs)): ?></a>
<?php endif ?>
			</li>
<?php endif ?>
		</ul>
		<ul>
<?php if ($config->download): ?>			<li>
				<a href="<?php echo htmlSpecialChars($archive) ?>" title="Download documentation as ZIP archive"><span>Download</span></a>
			</li>
<?php endif ?>
		</ul>
	</div>

<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>

	<div id="footer">
		<?php echo Nette\Templating\Helpers::escapeHtml($config->title, ENT_NOQUOTES) ?>
 API documentation generated by <a href="http://apigen.org"><?php echo Nette\Templating\Helpers::escapeHtml($generator, ENT_NOQUOTES) ?>
 <?php echo Nette\Templating\Helpers::escapeHtml($version, ENT_NOQUOTES) ?></a>
	</div>
</div>
</div>
</body>
</html>
