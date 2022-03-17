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

       /*
     * format_date_to_abbreviation
     * format 27 ก.ย. 2564
     * @input  old_date
     * @output format
     * @author Nantasiri Saiwaew 62160093
     * @Create Date 2565-03-18
     * @Update -
     */
    function format_date_to_abbreviation(old_date) {
        let month_name = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค."
        ];
        let date_old = new Date(old_date);
        let year_thai = date_old.getFullYear()+543;
        let format = date_old.getDate() + ' ' + month_name[date_old.getMonth()] + ' ' + year_thai;
        return format;
    }
</script>