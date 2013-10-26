<?php include('header.php'); ?>

		<div class="summary" id="zen-summary" role="article">
			<p>A demonstration of what can be accomplished through <abbr title="Cascading Style Sheets">CSS</abbr>-based design. Select any style sheet from the list to load it into this page.</p>
			<p>Download the example <a href="/examples/index" title="This page's source HTML code, not to be modified.">html file</a> and <a href="/examples/style.css" title="This page's sample CSS, the file you may modify.">css file</a></p>
		</div>

		<div class="preamble" id="zen-preamble" role="article" data-bind="with: featured">
			<h3 data-bind="html: title, attr:{style: 'background-image: url('+ Image() + ')'}">featured title</h3>
			<p data-bind="html: Body">body goes here</p>
		</div>
	</section>

	<div class="main supporting" id="zen-supporting" role="main">
	    <section data-bind='foreach: articles'>
		<div role="article">
			<h3 data-bind="html: title">So What is This About?</h3>
			<p data-bind="html: Body">body goes here</p>
			<img data-bind="attr: {src: Image}"/>
		</div>
           </section>
        <?php include('footer.php'); ?>

	</div>


	<aside class="sidebar" role="complementary">
		<div class="wrapper">

			<div class="design-selection" id="design-selection">
				<h3 class="select">Select a Design:</h3>
				<nav role="navigation">
					<ul>
					<li>
						<a href="?cssfile=/216/216.css" class="design-name">Fountain Kiss</a> by						<a href="http://jeremycarlson.com" class="designer-name">Jeremy Carlson</a>
					</li>					<li>
						<a href="?cssfile=/215/215.css" class="design-name">A Robot Named Jimmy</a> by						<a href="http://meltmedia.com/" class="designer-name">meltmedia</a>
					</li>					<li>
						<a href="?cssfile=/214/214.css" class="design-name">Verde Moderna</a> by						<a href="http://www.mezzoblue.com/" class="designer-name">Dave Shea</a>
					</li>					<li>
						<a href="?cssfile=/213/213.css" class="design-name">Under the Sea!</a> by						<a href="http://www.ericstoltz.com/" class="designer-name">Eric Stoltz</a>
					</li>					<li>
						<a href="?cssfile=/212/212.css" class="design-name">Make ’em Proud</a> by						<a href="http://skybased.com/" class="designer-name">Michael McAghon and Scotty Reifsnyder</a>
					</li>					<li>
						<a href="?cssfile=/211/211.css" class="design-name">Orchid Beauty</a> by						<a href="#" class="designer-name">Kevin Addison</a>
					</li>					<li>
						<a href="?cssfile=/210/210.css" class="design-name">Oceanscape</a> by						<a href="http://www.pixel-house.com.au/" class="designer-name">Justin Gray</a>
					</li>					<li>
						<a href="?cssfile=/209/209.css" class="design-name">CSS Co., Ltd.</a> by						<a href="http://www.benklemm.de/" class="designer-name">Benjamin Klemm</a>
					</li>					</ul>
				</nav>
			</div>

			<div class="design-archives" id="design-archives">
				<h3 class="archives">Archives:</h3>
				<nav role="navigation">
					<ul>
						<li class="next">
							<a href="?cssfile=/214/214.css&amp;page=1">
								Next Designs <span class="indicator">&rsaquo;</span>
							</a>
						</li>
						<li class="viewall">
							<a href="http://www.mezzoblue.com/zengarden/alldesigns/" title="View every submission to the Zen Garden.">
								View All Designs							</a>
						</li>
					</ul>
				</nav>
			</div>

			<div class="zen-resources" id="zen-resources">
				<h3 class="resources">Resources:</h3>
				<ul>
					<li class="view-css">
						<a href="/214/214.css" title="View the source CSS file of the currently-viewed design.">
							View This Design&#8217;s <abbr title="Cascading Style Sheets">CSS</abbr>						</a>
					</li>
					<li class="css-resources">
						<a href="http://www.mezzoblue.com/zengarden/resources/" title="Links to great sites with information on using CSS.">
							<abbr title="Cascading Style Sheets">CSS</abbr> Resources						</a>
					</li>
					<li class="zen-faq">
						<a href="http://www.mezzoblue.com/zengarden/faq/" title="A list of Frequently Asked Questions about the Zen Garden.">
							<abbr title="Frequently Asked Questions">FAQ</abbr>						</a>
					</li>
					<li class="zen-submit">
						<a href="http://www.mezzoblue.com/zengarden/submit/" title="Send in your own CSS file.">
							Submit a Design						</a>
					</li>
					<li class="zen-translations">
						<a href="http://www.mezzoblue.com/zengarden/translations/" title="View translated versions of this page.">
							Translations						</a>
					</li>
				</ul>
			</div>
		</div>
	</aside>


</div>

<!--

	These superfluous divs/spans were originally provided as catch-alls to add extra imagery.
	These days we have full ::before and ::after support, favour using those instead.
	These only remain for historical design compatibility. They might go away one day.

-->
<div class="extra1" role="presentation"></div><div class="extra2" role="presentation"></div><div class="extra3" role="presentation"></div>
<div class="extra4" role="presentation"></div><div class="extra5" role="presentation"></div><div class="extra6" role="presentation"></div>

</body>
<script>
  // Our Data Layer / Models
  App = { articles: new Backbone.Collection() };
  App.articles.url = Config.dataUrl || 'data/articles.json';

  // The View(Model)
  App.ViewModel = {
    articles: kb.collectionObservable(App.articles),
    featured: ko.observable()
  }

  // Get the data.
  App.articles.fetch({success:
    function () {
      //Put the first Article into the featured position.
      App.ViewModel.featured(kb.viewModel(App.articles.shift()))
    }
  });

  kb.applyBindings(App.ViewModel, document.getElementById("viewMain"));
</script>
</html>
