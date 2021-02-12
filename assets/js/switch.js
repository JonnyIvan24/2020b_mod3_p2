switch (new Date().getDay()) {
    case 6:
        var text = "Hoy es sabado";
        break;
    case 0:
        var text = "Hoy es Domingo";
        break;
    default:
        var text = "Hoy es un día como cualquier otro día excepto Sabado y Domingo";
}

document.write(text);
