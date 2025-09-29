package test;

import java.util.Scanner;

public class DienThoai {
    private String tenDienThoai;
    private double giaDienThoai;

    public DienThoai() {}
    public DienThoai(String tenDienThoai, double giaDienThoai) {
        this.tenDienThoai = tenDienThoai;
        this.giaDienThoai = giaDienThoai;
    }

    public String getTenDienThoai() {
        return tenDienThoai;
    }

    public void setTenDienThoai(String tenDienThoai) {
        this.tenDienThoai = tenDienThoai;
    }

    public double getGiaDienThoai() {
        return giaDienThoai;
    }

    public void setGiaDienThoai(double giaDienThoai) {
        this.giaDienThoai = giaDienThoai;
    }

    public void nhap() {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap ten dien thoai: ");
        this.tenDienThoai = sc.nextLine();

        System.out.print("Moi nhap gia dien thoai: ");
        this.giaDienThoai = sc.nextDouble();
    }

    public void xuat() {
        System.out.println();
        System.out.println("Ten dien thoai: " + tenDienThoai);
        System.out.println("Gia dien thoai: " + giaDienThoai);
    }

    public int giamGia() {
        int giamGia = 100000;
        if (giaDienThoai > 2000000) giamGia = 200000;
        else if (giaDienThoai > 1000000 && giaDienThoai < 2000000) giamGia = 150000;
        return giamGia;
    }

    public void thanhTien() {
        System.out.println("Tong so tien la: " + (giaDienThoai - giamGia()));
    }

    public void chuyenChuHoa() {
        System.out.println("Chu sau khi chuyen hoa: " + tenDienThoai.toUpperCase());
    }

    public void chuyenChuThuong() {
        System.out.println("Chu sau khi chuyen thuong la: " + tenDienThoai.toLowerCase());
    }
    
    public void inHoaChuCaiDauMoiTu() {
        tenDienThoai = " " + tenDienThoai.trim();
        int strLen = tenDienThoai.length();

        for (int i = 0; i < strLen; i++) {
            if (tenDienThoai.substring(i, i + 1).equals(" ")) {
                tenDienThoai = tenDienThoai.replace(tenDienThoai.substring(i, i + 2), tenDienThoai.substring(i, i + 2).toUpperCase());
            }
        }

        tenDienThoai = tenDienThoai.trim();
        System.out.println("Chuoi sau khi bien doi la: " + tenDienThoai);
        System.out.println();
    }

    public static void main(String[] args) {
        DienThoai dt = new DienThoai();
        dt.nhap();
        dt.xuat();
        dt.thanhTien();
        dt.chuyenChuHoa();
        dt.chuyenChuThuong();
        dt.inHoaChuCaiDauMoiTu();
    }
}
