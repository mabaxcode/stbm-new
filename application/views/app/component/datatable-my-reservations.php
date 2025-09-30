<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <h4 class="card-title">Basic</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table
            id="myReservationsTable"
            class="display table table-striped table-hover table-head-bg-info mt-4"
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
                        <?php if ($value['status'] == 'Dalam Proses'): ?>
                            <a
                                data-bs-toggle="tooltip"
                                title="Lihat Butiran"
                                class="btn-link btn-primary btn-view-reservation"
                                data-id="<?php echo $value['id']; ?>"
                                data-original-title="Edit"
                            >
                                <i class="fa fa-edit"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a
                                data-bs-toggle="tooltip"
                                title="Batalkan Tempahan"
                                class="btn-link btn-danger btn-delete-reservation"
                                data-id="<?php echo $value['id']; ?>"
                                data-original-title="Edit Task"
                            >
                                <i class="fa fa-trash"></i>
                            </a>
                        <?php else: ?>
                            <a
                                data-bs-toggle="tooltip"
                                title="Lihat Butiran"
                                class="btn-link btn-primary btn-view-reservation"
                                data-id="<?php echo $value['id']; ?>"
                                data-original-title="Edit"
                            >
                                <i class="fa fa-edit"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a
                                class="btn-link btn-danger"
                                data-original-title=""
                            >
                                <i class="fa fa-ban"></i>
                            </a>
                        <?php endif; ?>
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

    