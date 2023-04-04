@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'DPKKA Universitas Airlangga')
<img src="https://dpkka.unair.ac.id/public/main/1636966891_logo_landscape.png" class="logo" alt="DPKKA Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
