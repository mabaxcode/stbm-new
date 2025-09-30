<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Senarai Permohonan</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table
            id="myReservationsTable"
            class="display table table-striped table-hover table-head-bg-secondary mt-4"
            style="background-color:#d9dce7;"
            >
            <thead>
                <tr>
                    <th>Bilik</th>
                    <th>Tarikh (Mula)</th>
                    <th>Tarikh (Tamat)</th>
                    <th>Dibuat Pada</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $key => $value): ?>
                <tr>
                    <td><?php echo $value['room_name']; ?></td>
                    <td><?php echo convert_date($value['start_time']); ?></td>
                    <td><?php echo convert_date($value['end_time']); ?></td>
                    <td><?php echo dmy($value['created_at']); ?></td>
                    <td><?php echo status_span_class($value['status']); ?></td>
                    <td style="text-align: center;">
                        <?php 
                        $encrypted_id = $this->encryption->encrypt($value['id']);
                        $safe_id = urlencode(base64_encode($encrypted_id));
                        ?>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('app/proses/'.$safe_id); ?>"><?php echo $btn_name; ?></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<!-- btn-view-reservation is at global js -->

    