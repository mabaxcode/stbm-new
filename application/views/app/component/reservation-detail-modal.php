<?php /*
<div class="col-md-12 ps-md-0">
    <div class=" card-pricing">
        <div class="card-header">
            <h4 class="card-title"><?php echo $reservation['room_name'] ?></h4>
        </div>
        <div class="card-body">
        <ul class="specification-list">
            <li>
            <span class="name-specification">Tajuk</span>
            <span class="status-specification"><b><?php echo $reservation['title'] ?></b></span>
            </li>
            <li>
            <span class="name-specification">Agenda</span>
            <span class="status-specification"><b><?php echo $reservation['purpose'] ?></b></span>
            </li>
            <li>
            <span class="name-specification">Bilik Mesyuarat</span>
            <span class="status-specification"><b><?php echo $reservation['room_name'] ?></b></span>
            </li>
            <li>
            <span class="name-specification">Tarikh & Masa (Mula)</span>
            <span class="status-specification"><b><?php echo convert_date($reservation['start_time']); ?></b></span>
            </li>
            <li>
            <span class="name-specification">Tarikh & Masa (Tamat)</span>
            <span class="status-specification"><b><?php echo convert_date($reservation['end_time']); ?></b></span>
            </li>
            <li>
            <span class="name-specification">Dibuat Pada</span>
            <span class="status-specification"><b><?php echo dmy($reservation['created_at']); ?></b></span>
            </li>
        </ul>
        </div>
        <div class="card-footer">
        <button class="btn btn-primary w-100">
            <b>Get Started</b>
        </button>
        </div>
    </div>
</div>
*/?>


<div class="card-round">
    <div class="card-body">
    <div class="card-list">
        <div class="item-list">
            <div class="info-user ms-3">
                <div class="username">Bilik Mesyuarat</div>
                <div class="status"><b><?php echo $reservation['room_name'] ?></b></div>
            </div>
            <?php echo status_span_class($reservation['status']); ?>
        </div>
        <div class="item-list">
            <div class="info-user ms-3">
                <div class="username">Tajuk</div>
                <div class="status"><b><?php echo $reservation['title'] ?></b></div>
            </div>
        </div>
        <div class="item-list">
            <div class="info-user ms-3">
                <div class="username">Agenda</div>
                <div class="status"><b><?php echo $reservation['purpose'] ?></b></div>
            </div>
        </div>
        <div class="item-list">
            <div class="info-user ms-3">
                <div class="username">Tarikh & Masa (Mula)</div>
                <div class="status"><b><?php echo convert_date($reservation['start_time']); ?></b></div>
            </div>
        </div>
        <div class="item-list">
            <div class="info-user ms-3">
                <div class="username">Tarikh & Masa (Tamat)</div>
                <div class="status"><b><?php echo convert_date($reservation['end_time']); ?></b></div>
            </div>
        </div>
        <div class="item-list">
            <div class="info-user ms-3">
                <div class="username">Ditempah Pada</div>
                <div class="status"><b><?php echo dmy($reservation['created_at']); ?></b></div>
            </div>
        </div>
        <div class="item-list">
            <div class="info-user ms-3">
                <div class="username">Ditempah Oleh</div>
                <div class="status"><b><?php echo strtoupper($reservation['user_name']); ?></b></div>
            </div>
        </div>
    </div>
    </div>
    </div>