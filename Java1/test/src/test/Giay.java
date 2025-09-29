package test;

import java.util.ArrayList;
import java.util.Scanner;

public class Giay {
    private String tenGiay;
    private String theLoai;
    private double giaTien;
    private String regexTen = "^[a-zA-Z0-9 ]+$";
    private String regexTien = "^\\d+(\\.\\d+)?$";
    private ArrayList<Giay> giay = new ArrayList<>();

    public void nhap() {
        Scanner sc = new Scanner(System.in);
        String tiepTuc;
        
        do {
            Giay g = new Giay();
            do {
                System.out.print("Moi nhap ten giay: ");
                g.tenGiay = sc.nextLine();
            } while (!g.tenGiay.matches(regexTen));

            do {
                System.out.print("Moi nhap the loai giay: ");
                g.theLoai = sc.nextLine();
            } while (!g.theLoai.matches(regexTen));

            String gt;
            do {
                System.out.print("Moi nhap gia tien: ");
                gt = sc.nextLine();
            } while (Double.parseDouble(gt) < 0 && !gt.matches(regexTien));
            g.giaTien = Double.parseDouble(gt);
            giay.add(g);

            do {
                System.out.println("y: nhap tiep");
                System.out.println("n: tro ve menu");
                System.out.print("Ban co muon nhap tiep khong?: ");
                tiepTuc = sc.nextLine();
            } while (!tiepTuc.equalsIgnoreCase("y") && !tiepTuc.equalsIgnoreCase("n"));
        } while (tiepTuc.equalsIgnoreCase("y"));
    }

    public void xuat() {
        for (Giay g : giay) {
            System.out.println();
            System.out.println("Ten giay: " + g.tenGiay);
            System.out.println("The loai giay: " + g.theLoai);
            System.out.println("Gia tien: " + g.giaTien);
        }
    }
    
    public void capNhatThongTinGiay() {
        Scanner sc = new Scanner(System.in);
        String tenGiay; 
        do {
            System.out.print("Moi nhap ten giay can cap nhat: ");
            tenGiay = sc.nextLine();
        } while (!tenGiay.matches(regexTen));

        for (Giay g : giay) {
            if (g.tenGiay.equalsIgnoreCase(tenGiay)) {
                do {
                    System.out.print("Moi nhap ten giay moi: ");
                    g.tenGiay = sc.nextLine();
                } while (!g.tenGiay.matches(regexTen));
    
                do {
                    System.out.print("Moi nhap the loai giay moi: ");
                    g.theLoai = sc.nextLine();
                } while (!g.theLoai.matches(regexTen));
    
                String gt;
                do {
                    System.out.print("Moi nhap gia tien moi: ");
                    gt = sc.nextLine();
                } while (Double.parseDouble(gt) < 0 && !gt.matches(regexTien));
                g.giaTien = Double.parseDouble(gt);
            }
        }
    }

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        Giay g = new Giay();
        String tiepTuc;

        do {
            System.out.println("1. Nhap");
            System.out.println("2. Xuat");
            System.out.println("3. Tim kiem theo ten hoac the loai");
            System.out.println("4. Cap nhat thong tin giay");
            System.out.println("5. Thoat");

            int chucNang;
            do {
                System.out.print("Moi chon chuc nang(1-5): ");
                chucNang = sc.nextInt();
            } while (chucNang < 1 && chucNang > 5);

            switch (chucNang) {
                case 1: {
                    g.nhap();
                    tiepTuc = "y";
                    break;
                }

                case 2: {
                    g.xuat();
                    break;
                }

                case 4: {
                    g.capNhatThongTinGiay();
                    break;
                }

                case 5: return;
            }

            do {
                System.out.print("Ban co muon tiep tuc khong? (y/n): ");
                sc.nextLine();
                tiepTuc = sc.nextLine();
            } while (!tiepTuc.equalsIgnoreCase("y") && !tiepTuc.equalsIgnoreCase("n"));
        } while (tiepTuc.equalsIgnoreCase("y"));
    }
}
