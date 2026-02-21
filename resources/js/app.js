import Swal from 'sweetalert2';
import Alpine from 'alpinejs';
import './echo';

window.Alpine = Alpine;
Alpine.start();

// Listener notif public channel
window.Echo.channel('peminjaman')
    .listen('.peminjaman.diajukan', (e) => {
        console.log('Data notif:', e.data);

        switch(e.data.tipe) {
            case 'peminjaman_diajukan':
                Swal.fire({
                    icon: 'info',
                    title: 'Peminjaman Baru Diajukan',
                    html: `
                        <b>Siswa:</b> ${e.data.nama_siswa}<br>
                        <b>Buku:</b> ${e.data.judul_buku}<br>
                        <b>Jumlah:</b> ${e.data.jumlah}<br>
                        <small>${e.data.tanggal}</small>
                    `,
                    confirmButtonText: 'OK'
                });
                break;

            case 'peminjaman_disetujui':
                Swal.fire({
                    icon: 'success',
                    title: 'Peminjaman Disetujui',
                    html: `
                        <b>Buku:</b> ${e.data.judul_buku}<br>
                        <b>Jumlah:</b> ${e.data.jumlah}
                    `,
                });
                break;

            case 'peminjaman_ditolak':
                Swal.fire({
                    icon: 'error',
                    title: 'Peminjaman Ditolak',
                    html: `
                        <b>Buku:</b> ${e.data.judul_buku}<br>
                        <b>Jumlah:</b> ${e.data.jumlah}
                    `,
                });
                break;

            default:
                Swal.fire({
                    icon: 'info',
                    title: 'Notifikasi',
                    text: e.data.isi || 'Ada notifikasi baru',
                });
        }
    })
