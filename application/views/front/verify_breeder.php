<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<div class="main-container">
    <div class="container">
        <div class="row">
           
            <h2 class="title-2">
                <strong> Verify Breeder</strong>
            </h2>


<div class="col-md-2"> </div>
<div class="col-md-8">
            <div class="form-group mb-2">
                <label for="exampleInputEmail1">Breeder ID</label>
                <input type="email" class="form-control" id="breederid" aria-describedby="emailHelp" placeholder="Enter Breeder ID">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <button type="submit" id="submit" style="width:100%" class="btn btn-primary mb-2">Verify</button>
            <div class="msg mt-2">

            </div>
            </div>
            <div class="col-md-2"> </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var token = "<?= $this->security->get_csrf_hash(); ?>";
        $("#submit").click(function(e) {
            e.preventDefault();
            var id = $("#breederid").val();

            $("#submit").empty();
            $("#submit").append(' Checking...');


            $('.msg').empty();

            if (id == '') {
                $.alert('Enter Breeder ID');
                 $("#submit").empty();
                        $("#submit").append(' Verify');
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>Page/verify",
                    data: {
                        id: id,
                        'csrf_test_name': token
                    },
                    dataType: "JSON",
                    success: function(response) {
                        $('.msg').empty();
                        $('.msg').append(response.msg);
                        $("#submit").empty();
                        $("#submit").append(' Verify');
                    }
                });
            }

        });
    });
</script>