#include <stdio.h>
#include <math.h>

bool kiemTraSoHoanHao(int n) {
    int tong = 0;

    for (int i = 1; i < n; i++) {
        if (n % i == 0) tong += i;
    }

    if (tong == n) return true;
    return false;
}

float tinhTBTongCacSoHoanhao(int a[], int n) {
    int tong = 0, soLuong = 0;
    float kq = 0;

    for (int i = 0; i < n; i++) {
        int soHoanHao = kiemTraSoHoanHao(a[i]);
        
        if (soHoanHao) {
            tong += a[i];
            soLuong++;
        }
    }

    return kq = (float)tong / soLuong;
}

int main() {
    int n;
    printf("Moi nhap so luong phan tu cua mang: ");
    scanf("%d", &n);

    int a[n];
    for (int i = 0; i < n; i++) {
        printf("a[%d]: ", i);
        scanf("%d", &a[i]);
    }

    float kq = tinhTBTongCacSoHoanhao(a, n);

    printf("\nTrung binh tong cac so hoan hao la: %g\n", kq);
    return 0;
}