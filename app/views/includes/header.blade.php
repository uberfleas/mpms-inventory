<div class="navbar">
	<div class="navbar-inner">
		<ul class="nav nav-pills">
			<li><a href="/users">Users</a></li>
			<li><a href="/shows">Shows</a></li>
			<li><a href="/customers">Customers</a></li>
			<li><a href="/commissions">Commissions</a></li>
			<li><a href="/artobjs">Art Objects</a></li>
			<li><a href="/mediums">Mediums</a></li>
			<li><a href="/genres">Genres</a></li>
		</ul>
	</div>
</div>

<div class="container">

@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif