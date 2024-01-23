<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{ asset('/vendor/laravel-atlas/logo.ico') }}">
<meta name="robots" content="noindex, nofollow">
<title>Routes List {{ config('app.name') ? ' - ' . config('app.name') : '' }}</title>
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600" rel="stylesheet" />
<link href="{{ asset('/vendor/laravel-atlas/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
<div id="atlas">

<div class="container mb-5">
<div class="d-flex align-items-center justify-content-between py-4 header">
<div class="d-flex align-items-center logo">
<svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400">
<style>
.s0 {
fill: #f9332b;
stroke: #fff;
stroke-linecap: round;
stroke-linejoin: round;
stroke-width: 16
}
</style>
<path id="Layer" fill-rule="evenodd" class="s0" d="M78.9 101.7C87.1 62.7 113 40 148.3 26c139.1-55.1 254.8 107.2 146 231.2-90.4 103.3-259.4 8-227.7-101.3" />
<path fill-rule="evenodd" class="s0" d="M206.2 255.4c5.9-9.3 24.6-19.6 36.5-15.7 30.7 10.1-2.3 58.6-23.4 60.3-34.6 2.6-29.9-46.3-8.5-58.5m10.1 63.1q0 4.9-2.8 28.1-22 11.8-22 5.4c0-5.4-6.6-16-6.6-33.5" />
<path fill-rule="evenodd" class="s0" d="M204.5 338.8c49.6-13.6 35-6.2 29.3 46.3m-34.1-38.8c13.6 42.9-17.9 34.9-53.4 38.8m40.3-81.6q-49 4.9-56.8-12.4m91.1 11.8c19.5 1.1 59.7-10.2 59.7-25.2" />
</svg>
<h4 class="mb-0 ml-3"><strong>Laravel</strong> Atlas</h4>
</div>
<div class="d-flex align-items-center">
<button class="btn btn-muted mr-2 d-flex align-items-center py-2" v-on:click.prevent="clearEntries" title="Clear entries">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="icon mr-2" fill="currentColor">
<path d="M105.1 202.6c7.7-21.8 20.2-42.3 37.8-59.8c62.5-62.5 163.8-62.5 226.3 0L386.3 160H352c-17.7 0-32 14.3-32 32s14.3 32 32 32H463.5c0 0 0 0 0 0h.4c17.7 0 32-14.3 32-32V80c0-17.7-14.3-32-32-32s-32 14.3-32 32v35.2L414.4 97.6c-87.5-87.5-229.3-87.5-316.8 0C73.2 122 55.6 150.7 44.8 181.4c-5.9 16.7 2.9 34.9 19.5 40.8s34.9-2.9 40.8-19.5zM39 289.3c-5 1.5-9.8 4.2-13.7 8.2c-4 4-6.7 8.8-8.1 14c-.3 1.2-.6 2.5-.8 3.8c-.3 1.7-.4 3.4-.4 5.1V432c0 17.7 14.3 32 32 32s32-14.3 32-32V396.9l17.6 17.5 0 0c87.5 87.4 229.3 87.4 316.7 0c24.4-24.4 42.1-53.1 52.9-83.7c5.9-16.7-2.9-34.9-19.5-40.8s-34.9 2.9-40.8 19.5c-7.7 21.8-20.2 42.3-37.8 59.8c-62.5 62.5-163.8 62.5-226.3 0l-.1-.1L125.6 352H160c17.7 0 32-14.3 32-32s-14.3-32-32-32H48.4c-1.6 0-3.2 .1-4.8 .3s-3.1 .5-4.6 1z" />
</svg>Refresh
</button>

<button class="btn btn-muted d-flex align-items-center py-2" v-on:click.prevent="clearEntries" title="Clear entries">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="icon mr-2" fill="currentColor">
<path d="M344 0H488c13.3 0 24 10.7 24 24V168c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-39-39-87 87c-9.4 9.4-24.6 9.4-33.9 0l-32-32c-9.4-9.4-9.4-24.6 0-33.9l87-87L327 41c-6.9-6.9-8.9-17.2-5.2-26.2S334.3 0 344 0zM168 512H24c-13.3 0-24-10.7-24-24V344c0-9.7 5.8-18.5 14.8-22.2s19.3-1.7 26.2 5.2l39 39 87-87c9.4-9.4 24.6-9.4 33.9 0l32 32c9.4 9.4 9.4 24.6 0 33.9l-87 87 39 39c6.9 6.9 8.9 17.2 5.2 26.2s-12.5 14.8-22.2 14.8z" />
</svg>Go to Fullscreen
</button>
</div>
</div>

<div class="card mt-4">
<div class="card-header d-flex align-items-center justify-content-between">
<h2 class="h6 m-0">Routes ({{ count($routes) }})</h2>
<div class="form-control-with-icon w-25">
<div class="icon-wrapper"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="icon">
<path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd"></path>
</svg></div> <input type="text" id="searchInput" placeholder="Search" class="form-control w-100">
</div>
</div>
</div>

<div class="card card-content rounded-0 rounded-bottom">
<table id="indexScreen" class="table table-hover mb-0 penultimate-column-right">
<thead>
<tr>
<th scope="col">Methods</th>
<th scope="col" class="domain">Domain</th>
<th scope="col">Path</th>
<th scope="col">Name</th>
<th scope="col">Action</th>
<th scope="col">Middleware</th>
<!-- <th scope="col" class="text-center">Status</th> -->
<!-- <th scope="col" class="text-right">Duration</th>
<th scope="col">Happened</th>
<th scope="col"></th> -->
</tr>
</thead>
<tbody>
<?php $methodColours = ['GET' => 'success', 'HEAD' => 'default', 'OPTIONS' => 'default', 'POST' => 'primary', 'PUT' => 'warning', 'PATCH' => 'info', 'DELETE' => 'danger']; ?>
@foreach ($routes as $route)
<tr>
<td class="table-fit pr-0">
@foreach (array_diff($route->methods(), config('laravel-atlas.hide_methods')) as $method)
<span class="badge badge-{{ $methodColours[$method] }}">{{ $method }}</span>
@endforeach
</td>
<td class="domain{{ strlen($route->domain()) == 0 ? ' domain-empty' : '' }}">{{ $route->domain() }}</td>
<td class="table-fit">
{!! preg_replace('#({[^}]+})#', '<span class="text-warning">$1</span>', $route->uri()) !!}
</td>
<td class="table-fit text-muted">{{ $route->getName() }}</td>
<td class="table-fit text-muted">
{!! preg_replace('#(@.*)$#', '<span class="text-warning">$1</span>', $route->getActionName()) !!}
</td>
<td class="table-fit">
@if (is_callable([$route, 'controllerMiddleware']))
{{ implode(', ', array_map($middlewareClosure, array_merge($route->middleware(), $route->controllerMiddleware()))) }}
@else
{{ implode(', ', $route->middleware()) }}
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>

<script src="{{ asset('/vendor/laravel-atlas/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">
function hideEmptyDomainColumn() {
var table = document.querySelector('.table');
var domains = table.querySelectorAll('tbody .domain');
var emptyDomains = table.querySelectorAll('tbody .domain-empty');
if (domains.length == emptyDomains.length) {
table.className += ' hide-domains';
}

table.style.visibility = 'visible';
}

hideEmptyDomainColumn();
</script>
</body>

</html>