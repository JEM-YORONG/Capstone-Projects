<script>
    window.onload = () => {
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('paste', e => {
                e.preventDefault()
            })
            input.autocomplete = 'off'
        })
    }
</script>