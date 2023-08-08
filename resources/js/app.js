import "../css/app.css";

import Alpine from "alpinejs";
import mask from "@alpinejs/mask";

window.Alpine = Alpine;

window.Alpine.plugin(mask);

window.Swal = require("sweetalert2");

Alpine.start();
