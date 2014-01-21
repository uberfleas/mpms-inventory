<div class="navbar">
	<div class="navbar-inner">
		<ul class="nav nav-pills">
			<li><a href="/">Home</a></li>
			<li><a href="/about">About</a></li>
			<li><a href="/projects">Projects</a></li>
			<li><a href="/contact">Contact</a></li>
		</ul>
	</div>
</div>

@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif