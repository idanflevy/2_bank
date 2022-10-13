@auth
<script>
  window.user = @json(auth()->user())
</script>
@endauth