import "../css/app.css";
import Swal from "sweetalert2/dist/sweetalert2.js"; // SweetAlert
import "sweetalert2/src/sweetalert2.scss"; // SweetAlert estilos

import Alpine from "alpinejs";
import mask from "@alpinejs/mask";

window.Alpine = Alpine;

window.Alpine.plugin(mask);

window.Swal = Swal;

Alpine.start();
