
{{ content() }}

{% block script_footer %}
    <!--script for this page-->
    {{ javascript_include('assets/js/jquery.js') }}
    <script>
        //custom select box

        $(function(){
            $('select.styled').customSelect();
        });

    </script>
{% endblock %}