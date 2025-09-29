#include <stdio.h>

void xacDinhDonVi(int number) {
    char DonVi[3][10] = {{"tram"}, {"chuc"}, {"don vi"}};
    int donVi = number % 10;
    int chuc = number % 100 / 10;
    int tram = number % 1000 / 100;
    int viTriLonNhat;

    int max = donVi > chuc ? donVi : chuc;
    max = max > tram ? max : tram;

    if (max == donVi) viTriLonNhat = 2;
    else if (max == chuc) viTriLonNhat = 1;
    else viTriLonNhat = 0;

    printf("Chu so lon nhat la %d nam o hang %s\n", max, DonVi[viTriLonNhat]);
}

int main() {
    int n;
    printf("Moi nhap n(100 -> 999): ");
    scanf("%d", &n);

    xacDinhDonVi(n);
    return 0;
}