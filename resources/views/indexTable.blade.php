@section('table_style')
<style type="text/css">
    h3 {margin-left: 20px;}
    table {
        font-size: 14px;
        border-collapse: collapse;
        text-align: center;
        margin-left: 30px;
        margin-top: 30px;
    }
    th, td:first-child {
        /*background: #AFCDE7;*/
        background: #2a88bd;
        color: white;
        padding: 10px 20px;
    }
    th, td {
        border-style: solid;
        border-width: 0 1px 1px 0;
        border-color: white;
    }
    td {
        background: #D8E6F3;
    }
    th:first-child, td:first-child {
        text-align: left;
    }
</style>
    @endsection