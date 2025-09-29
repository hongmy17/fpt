/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
#include <string.h>

int main()
{
  int MSSV, i, n;
  struct SinhVien {
    int MSSV;
    char name[50], nganhHoc[50];
    float dtb;
  };

  printf("Moi nhap so sinh vien: ");
  scanf("%d", &n);

  struct SinhVien sv[n];
  for (i = 0; i < n; i++) 
  {
    printf("\nMoi nhap thong tin sinh vien thu %d\n", i + 1);
    printf("Ma so sinh vien: ");
    scanf("%d", &sv[i].MSSV);

    printf("Ten: ");
    fflush(stdin);
    if (fgets(sv[i].name, 255, stdin) != NULL)
      sv[i].name[strlen(sv[i].name) -1] = ' ';

    printf("Nganh hoc: ");
    fflush(stdin);
    if (fgets(sv[i].nganhHoc, 255, stdin) != NULL)
      sv[i].nganhHoc[strlen(sv[i].nganhHoc) -1] = ' ';

    printf("Diem trung binh: ");
    scanf("%f", &sv[i].dtb);
  }
  
  printf("\nMoi nhap mssv cua sinh vien muon tim: ");
  scanf("%d", &MSSV);
  
  for(i = 0;i < n; i++) {
    if (MSSV == sv[i].MSSV) {
      printf("\n");	
      printf("Ma so sinh vien: %d\n", sv[i].MSSV);
      printf("Ten: %s\n", sv[i].name);
      printf("Nganh hoc: %s\n", sv[i].nganhHoc);
      printf("Diem trung binh: %g\n", 1.0*sv[i].dtb);
      break;
    }
  }
  return 0;
}
