/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package ASM_Final;

import java.io.IOException;
import java.text.DecimalFormat;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class ASM_Final {

    /**
     * @param args the command line arguments
     */
    static class NhanVien {
        public String manv;
        public String hoTen;
        public double luong;
        public String chucVu;

        public NhanVien(String manv, String hoTen, double luong, String chucVu) {
            this.manv = manv;
            this.hoTen = hoTen;
            this.luong = luong;
            this.chucVu = chucVu;
        }

        public double getThuNhap() {
            return luong;
        }

        public double getThueTN() {
            if (getThuNhap() > 15000000) return getThuNhap() * 0.12;
            if (getThuNhap() >= 9000000) return getThuNhap() * 0.1;
            return 0;
        }

        public double getTongThuNhap() {
            return getThuNhap() - getThueTN();
        }

        public void xuatThongTin() {
            System.out.println("Ma nhan vien: " + manv);
            System.out.println("Ho ten: " + hoTen);
            System.out.println("Chuc vu: " + chucVu);
            System.out.println("Luong: " + fixErrorShowBigNumber(luong));
        }

        public String fixErrorShowBigNumber(double value) {
            DecimalFormat format = new DecimalFormat();
            String formattedValue = format.format(value);
            return formattedValue;
        }
    }

    static class TiepThi extends NhanVien {
        public double doanhSo;
        public double hueHong;

        public TiepThi(String manv, String hoTen, double luong, String chucVu, double doanhSo, double hueHong) {
            super(manv, hoTen, luong, chucVu);
            this.doanhSo = doanhSo;
            this.hueHong = hueHong;
        }

        public double getThuNhap() {
            return super.getThuNhap() + doanhSo + hueHong;
        }

        public void xuatThongTin() {
            super.xuatThongTin();
            System.out.println("Doanh so: " + fixErrorShowBigNumber(doanhSo));
            System.out.println("Hue hong: " + fixErrorShowBigNumber(hueHong));
            System.out.println("Tong thu nhap (da tru thue): " + fixErrorShowBigNumber(getTongThuNhap()));
            System.out.println();
        }
    }

    static class TruongPhong extends NhanVien {
        public double trachNhiem;
        public TruongPhong(String manv, String hoTen, double luong, String chucVu, double trachNhiem) {
            super(manv, hoTen, luong, chucVu);
            this.trachNhiem = trachNhiem;
        }

        public double getThuNhap() {
            return super.getThuNhap() + trachNhiem;
        }

        public void xuatThongTin() {
            super.xuatThongTin();
            System.out.println("Trach nhiem: " + fixErrorShowBigNumber(trachNhiem));
            System.out.println("Tong thu nhap (da tru thue): " + fixErrorShowBigNumber(getTongThuNhap()));
            System.out.println();
        }
    }

    // copy trên: https://stackoverflow.com/questions/2979383/how-to-clear-the-console
    // không chạy được trên netbean
    public static void clearScreen() {
        try {
            if (System.getProperty("os.name").contains("Windows"))
                new ProcessBuilder("cmd", "/c", "cls").inheritIO().start().waitFor();
            else
                Runtime.getRuntime().exec("clear");
        } catch (IOException | InterruptedException ex) {}
    }  

    public static void chucNang1(ArrayList<NhanVien> nvList) {
        clearScreen();
        Scanner sc = new Scanner(System.in);
        
        do {
            String manv;
            String regexId = "^[a-zA-z]{2}\\d{5}$";
            do {
                System.out.print("Moi nhap ma nhan vien (vd: pc05353): ");
                manv = sc.nextLine();
            } while (!manv.matches(regexId));

            String hoTen;
            String regexName = "^([a-zA-ZàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹĐđ]+\\s?)+$";
            do {
                System.out.print("Moi nhap ho ten: ");
                hoTen = sc.nextLine();
            } while (!hoTen.matches(regexName));

            System.out.print("Moi nhap luong: ");
            double luong = sc.nextDouble();

            String chucVu;
            sc.nextLine();
            do {
                System.out.print("Moi nhap chuc vu:(tiep thi / truong phong): ");
                chucVu = sc.nextLine();
            } while(!chucVu.equalsIgnoreCase("tiep thi") && !chucVu.equalsIgnoreCase("truong phong"));

            if (chucVu.equalsIgnoreCase("tiep thi")) {
                System.out.print("Moi nhap doanh so: ");
                double doanhSo = sc.nextDouble();
                
                System.out.print("Moi nhap hue hong: ");
                double hueHong = sc.nextDouble();

                TiepThi nv = new TiepThi(manv, hoTen, luong, chucVu, doanhSo, hueHong);
                nvList.add(nv);
            } else {
                System.out.print("Moi nhap trach nhiem: ");
                double trachNhiem = sc.nextDouble();
                TruongPhong nv = new TruongPhong(manv, hoTen, luong, chucVu, trachNhiem);
                nvList.add(nv);
            }

            sc.nextLine();
            String tiepTuc;
            do {
                System.out.println("y: Tiep tuc");
                System.out.println("n: Tro ve menu");
                System.out.print("Ban co muon nhap tiep khong?: ");
                tiepTuc = sc.nextLine();
            } while (!tiepTuc.equalsIgnoreCase("n") && !tiepTuc.equalsIgnoreCase("y"));

            System.out.println();
            if (tiepTuc.equalsIgnoreCase("n")) break;
        } while (true);
    }

    public static void chucNang2(ArrayList<NhanVien> nvList) {
        clearScreen();
        for (NhanVien nv : nvList)
            nv.xuatThongTin();
    }

    public static void chucNang3(ArrayList<NhanVien> nvList) {
        clearScreen();
        Scanner sc = new Scanner(System.in);
        String ma, regexId = "^[a-zA-z]{2}\\d{5}$";
        
        do {
            System.out.print("Moi nhap ma can tim: ");
            ma = sc.nextLine();
        } while (!ma.matches(regexId));
        boolean isPrinted = false;

        for (NhanVien nv : nvList) {
            if (nv.manv.equalsIgnoreCase(ma)) {
                nv.xuatThongTin();
                isPrinted = true;
            }
        }
        if (!isPrinted) System.out.println("Khong tim thay");
    }

    public static void chucNang4(ArrayList<NhanVien> nvList) {
        clearScreen();
        Scanner sc = new Scanner(System.in);
        String ma, regexId = "^[a-zA-z]{2}\\d{5}$";

        do {
            System.out.print("Moi nhap ma can xoa: ");
            ma = sc.nextLine();
        } while (!ma.matches(regexId));

        if (nvList.get(nvList.size() - 1).manv.equalsIgnoreCase(ma)) {
            nvList.remove(nvList.size() - 1);
            return;
        }
        
        boolean isRemoved = false;
        for (NhanVien nv : nvList) {
            if (nv.manv.equalsIgnoreCase(ma)) {
                nvList.remove(nv);
                isRemoved = true;
            }
        }
        if (!isRemoved) System.out.println("Khong tim thay");
    }

    public static void chucNang5(ArrayList<NhanVien> nvList) {
        clearScreen();
        Scanner sc = new Scanner(System.in);
        String ma, regexId = "^[a-zA-z]{2}\\d{5}$";

        do {
            System.out.print("Moi nhap ma can cap nhap: ");
            ma = sc.nextLine();
        } while (!ma.matches(regexId));

        for (int i = 0; i < nvList.size(); i++) {
            if (nvList.get(i).manv.equalsIgnoreCase(ma)) {
                nvList.remove(i);
                String manv;
                do {
                    System.out.print("Moi nhap ma nhan vien (vd: pc05353): ");
                    manv = sc.nextLine();
                } while (!manv.matches(regexId));

                String hoTen;
                String regexName = "^([a-zA-ZàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹĐđ]+\\s?)+$";
                do {
                    System.out.print("Moi nhap ho ten: ");
                    hoTen = sc.nextLine();
                } while (!hoTen.matches(regexName));

                System.out.print("Moi nhap luong: ");
                double luong = sc.nextDouble();

                String chucVu;
                sc.nextLine();
                do {
                    System.out.print("Moi nhap chuc vu:(tiep thi / truong phong): ");
                    chucVu = sc.nextLine();
                } while(!chucVu.equalsIgnoreCase("tiep thi") && !chucVu.equalsIgnoreCase("truong phong"));

                if (chucVu.equalsIgnoreCase("tiep thi")) {
                    System.out.print("Moi nhap doanh so: ");
                    double doanhSo = sc.nextDouble();
                    
                    System.out.print("Moi nhap hue hong: ");
                    double hueHong = sc.nextDouble();

                    TiepThi nv = new TiepThi(manv, hoTen, luong, chucVu, doanhSo, hueHong);
                    nvList.add(nv);
                } else {
                    System.out.print("Moi nhap trach nhiem: ");
                    double trachNhiem = sc.nextDouble();
                    TruongPhong nv = new TruongPhong(manv, hoTen, luong, chucVu, trachNhiem);
                    nvList.add(nv);
                }
            }
        }
    }

    public static void chucNang6(ArrayList<NhanVien> nvList) {
        clearScreen();
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap so luong can tim: ");
        double thuNhap = sc.nextDouble();

        for (NhanVien nv : nvList)
            if (nv.getTongThuNhap() == thuNhap)
                nv.xuatThongTin();
    }

    public static void chucNang7(ArrayList<NhanVien> nvList) {
        clearScreen();
        int num_nv = nvList.size();

        for (int i = 0; i < num_nv - 1; i++) {
            for (int j = i + 1; j < num_nv; j++) {
                String[] hoTen1 = nvList.get(i).hoTen.split(" ");
                String[] hoTen2 = nvList.get(j).hoTen.split(" ");
                int indexHoTen1 = hoTen1.length - 1, indexHoTen2 = hoTen2.length - 1;
                int count = 0, resultCompare = 0;
                boolean isSwapped = false;

                while ((indexHoTen1 < hoTen1.length - 1 && indexHoTen2 < hoTen2.length - 1) || count == 0) {
                    resultCompare = hoTen1[indexHoTen1].compareTo(hoTen2[indexHoTen2]);

                    if (resultCompare > 0) {
                        isSwapped = true;
                        Collections.swap(nvList, i, j);
                        break;
                    } else if (resultCompare < 0) break;

                    indexHoTen1 = count;
                    indexHoTen2 = count;
                    count++;
                }
                
                if (!isSwapped && resultCompare == 0 && hoTen1.length < hoTen2.length)
                    Collections.swap(nvList, i, j); 
            }
        }

        chucNang2(nvList);
    }

    public static void chucNang8(ArrayList<NhanVien> nvList) {
        clearScreen();
        int num_nv = nvList.size();

        for (int i = 0; i < num_nv - 1; i++) {
            for (int j = i + 1; j < num_nv; j++) {
                if (nvList.get(i).getTongThuNhap() < nvList.get(j).getTongThuNhap()) 
                    Collections.swap(nvList, i, j);
            }
        }

        chucNang2(nvList);
    }

    public static void chucNang9(ArrayList<NhanVien> nvList) {
        chucNang8(nvList);
        clearScreen();

        int count = 5, i = nvList.size() - 1;
        while (i >= 0 && count > 0) {
            nvList.get(i).xuatThongTin();
            count--;
            i--;
        }
    }

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String tiepTuc;
        ArrayList<NhanVien> nvList = new ArrayList<>();
          
        do {
            tiepTuc = "";
            clearScreen();
            System.out.println("1. Nhap danh sach sinh vien tu ban phim");
            System.out.println("2. Xuat danh sach sinh vien ra man hinh");
            System.out.println("3. Tim va hien thi nhan vien theo ma so");
            System.out.println("4. Xoa nhan vien theo ma nhap tu ban phim");
            System.out.println("5. Cap nhat thong tin nhan vien theo ma nhap tu ban phim");
            System.out.println("6. Tim cac nhan vien theo ma nhap tu ban phim");
            System.out.println("7. Sap xep nhan vien theo ho ten");
            System.out.println("8. Sap xep nhan vien theo thu nhap");
            System.out.println("9. Xuat 5 nhan vien co thu nhap cao nhat");
            System.out.println("10. Ket thuc");
            
            int chucNang;
            do {
                System.out.print("Moi chon chuc nang: ");
                chucNang = sc.nextInt();
            } while (chucNang < 1 || chucNang > 10);

            switch (chucNang) {
                case 1: {
                    chucNang1(nvList);
                    tiepTuc = "y";
                    break;
                }

                case 2: {
                    chucNang2(nvList);
                    break;
                }

                case 3: {
                    chucNang3(nvList);
                    break;
                }

                case 4: {
                    chucNang4(nvList);
                    break;
                }

                case 5: {
                    chucNang5(nvList);
                    break;
                }

                case 6: {
                    chucNang6(nvList);
                    break;
                }

                case 7: {
                    chucNang7(nvList);
                    break;
                }
                
                case 8: {
                    chucNang8(nvList);
                    break;
                }
                
                case 9: {
                    chucNang9(nvList);
                    break;
                }

                case 10: return;
            }

            if (tiepTuc.equals("")) {
                sc.nextLine();
                do {
                    System.out.print("Ban co muon tiep tuc khong? (y/n): ");
                    tiepTuc = sc.nextLine();
                } while (!tiepTuc.equalsIgnoreCase("n") && !tiepTuc.equalsIgnoreCase("y"));
            }
        } while (tiepTuc.equalsIgnoreCase("y"));
    }
}
