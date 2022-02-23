<script>
    /*
     * format_date_time
     * format 27 กันยายน 2564
     * @input  old_date
     * @output format
     * @author Suwapat Saowarod 62160340
     * @Create Date 2565-02-21
     * @Update -
     */
    function format_date(old_date) {
        let month_name = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
            "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
        ];
        let date_old = new Date(old_date);
        let year_thai = date_old.getFullYear()+543;
        let format = date_old.getDate() + ' ' + month_name[date_old.getMonth()] + ' ' + year_thai;
        return format;
    }
</script>