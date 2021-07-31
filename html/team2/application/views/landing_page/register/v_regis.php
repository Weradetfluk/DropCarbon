<style>
    h2 {
        padding-bottom: 5%;
        font-size: 70px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.685);
        font-weight: bold;
    }

    #card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }

    #card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        transform: scale(1.05);
    }

    a {
        text-decoration: none;
    }
</style>

<div class="container py-5">
    <h2 align="center">Drop Carbon System</h2>
    <div class="row">
        <div class="col">
            <div class="card h-100" id="card">
                <a href=" <?php echo site_url() . 'register/Tourist_regis/tourist_register_show'; ?>">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-success text-center">
                            <i class="fa fa-user fa-4x"></i>
                            <h1 class="h2 mt-4 text-center">สำหรับนักท่องเที่ยว</h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="card h-100" id="card">
                <a href=" <?php echo site_url() . 'Entrepreneur/Auth/Register_entrepreneur/show_regis_ent'; ?>">
                    <div class="h-100 py-5 services-icon-wap shadow">
                        <div class="h1 text-success text-center">
                            <i class="fa fa-users fa-4x"></i>
                            <h1 class="h2 mt-4 text-center">สำหรับผู้ประกอบการ</h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>