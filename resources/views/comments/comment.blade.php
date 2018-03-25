
<div class="panel panel-{{ $coloring }}">
   <div class="panel-heading"><strong>{{ $user->getNameOrUsername() }}</strong> ({{ $user->getRole() }}) <span style="float:right">{{ $commentTime }}</span></div>
   <div class="panel-body">
       {{ $body }}

   </div>
</div>
