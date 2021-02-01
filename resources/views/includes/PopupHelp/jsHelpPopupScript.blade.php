    {{-- Maneja el popup de ayuda --}}
    @auth        
    @if ($ayudaRuta == 1 )    
    <script>
        $(function(){
            $('#staticBackdropHelp').modal({
                backdrop:'static',
            });
        });
    </script>
    @endif

    <script>  

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#noShowMoreHelps').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "deleteAllHelps",
                type: 'POST',
                success: function(response) {
                    Swal.fire({
                        html: `<h4 style="font-weight: lighter">Ya no volveran a mostrarse mensajes de ayuda</h4>
                                <h4 class="text-center">(°<>°)</h4>`,
                        title: "¡No mas ayuda!",
                        text: "Texto",
                        icon: "success",
                        confirmButtonText: "Aceptar"
                    });

                },
                beforeSend: function(thisXHR) {
                },
                statusCode: {
                    404: function() {
                        alert("pagina no encontrada");
                    }
                },
                error: function(jqXHR, status, error) {
                    alert("Error al cargar");
                }
            });
        });



        $('#noShowOneHelp').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ $urlPagina}}",
                type: 'POST',
                success: function(response) {
                
                },
                beforeSend: function(thisXHR) {
                },
                statusCode: {
                    404: function() {
                        alert("pagina no encontrada");
                    }
                },
                error: function(jqXHR, status, error) {
                    alert("Error al cargar");
                }
            });
        });
    </script>
    @endauth
